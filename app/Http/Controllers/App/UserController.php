<?php
namespace Otman\Http\Controllers\App;

use Auth;
use Otman\User;
use Otman\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    /**
     * @param  int $id
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function updateRole($id, Request $request)
    {
        $user = User::find($id);
        $user->role = $request->role;
        
        if ($user->save()) {
            return redirect('/users/' . $id)->with(
                'success', 'Role of ' . $user->profile->firstname . ' ' . $user->profile->lastname . ' succesfully updated.'
            );
        }

        return redirect('/users/' . $id)->with(
            'fail', 'Failed to update the role of '  . $user->profile->firstname . ' ' . $user->profile->lastname . '.'
        );
    }
}