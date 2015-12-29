<?php
namespace Otman\Http\Controllers\Api;

use Hash;
use Validator;
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
    }

    /**
     * @param  int $id
     * @param  \Illuminate\Http\Request $request
     * @return string
     */
    public function update($id, Request $request)
    {
        $user = User::find($id);

        if (isset($request->email)) {
            $column = 'email';
            $validator = Validator::make($request->all(), array(
                'email' => 'required|email|max:255|unique:users'
            ));

            if ($validator->fails()) {
                return array(
                    'code'     => 3,
                    'status'   => 'validation failed',
                    'message' => $validator->errors()
                );
            }

            $user->email = $request->email;
        }

        if (isset($request->password)) {
            $column = 'password';
            $this->validate($request, array(
                'currentPassword' => 'required',
                'newPassword'     => 'required|min:6'
            ));

            $validator = Validator::make($request->all(), array(
                'currentPassword' => 'required',
                'newPassword'     => 'required|min:6'
            ));

            if ($validator->fails()) {
                return array(
                    'code'     => 3
                    'status'   => 'validation failed',
                    'message' => $validator->errors()
                );
            }

            if (Hash::check($request->currentPassword, $user->password)) {
                $user->password = bcrypt($request->newPassword);
            }

            return array(
                'code'    => 2,
                'status'  => 'error',
                'message' => 'Current password you entered does not match our record. Try again.'
            );
        }

        if ($user->save()) {
            return array(
                'code'    => 1,
                'status'  => 'ok',
                'message' => ucfirst($column) . ' was succesfully updated.'
            );
        } else {
            return array(
                'code'    => 2
                'status'  => 'error',
                'message' => 'Cannot update ' . ucfirst($column) . '. Try again.'
            );
        }
    }
}