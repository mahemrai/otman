<?php
namespace Otman\Http\Controllers\Entity;

use Hash;
use Otman\User;
use Otman\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * @package Otman
 * @uses    \Otman\Http\Controllers\Controller
 * @author  Mahendra Rai
 */
class UserController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

    /**
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
	public function changeEmailForm($id)
	{
		$user = User::find($id);
		return view('entity.user.change-email')->with('user', $user);
	}

    /**
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
	public function changePasswordForm($id)
	{
		$user = User::find($id);
		return view('entity.user.change-password')->with('user', $user);
	}

    /**
     * @param  int $id
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
	public function updateEmail($id, Request $request)
	{
		$this->validate($request, array(
			'email' => 'required|email|max:255|unique:users'
		));

		$user = User::find($id);
		$user->email = $request->email;

		if ($user->save()) {
			return redirect('/dashboard')->with('success', 'Your email was successfully updated.');
		}

		return view('entity.user.change-email')->with('fail', 'Failed to update your email. Try again.');
	}

    /**
     * @param int $id
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
	public function updatePassword($id, Request $request)
	{
		$this->validate($request, array(
			'current_password'      => 'required',
			'password'              => 'required|min:6',
			'password_confirmation' => 'required|min:6|same:password'
		));

		$user = User::find($id);

		if (Hash::check($request->current_password, $user->password)) {
			$user->password = bcrypt($request->password);

			if ($user->save()) {
				return redirect('/dashboard')->with('success', 'Your password was successfully updated.');
			}

			return view('entity.user.change-password')->with('fail', 'Failed to update your password. Try again.');
		}

		return view('entity.user.change-password')->with('fail', 'Current password you entered does not match our record. Try again.');
	}
}