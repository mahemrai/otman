<?php
namespace Otman\Http\Controllers\App;

use Auth;
use Otman\UserProfile;
use Otman\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProfileController extends Controller
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
    public function updateManagerStatus($id, Request $request)
    {
        $profile = UserProfile::where('user_id', $id)->first();
        $profile->is_manager = (bool) $request->isManager;

        if ($profile->save()) {
            return redirect('/users/' . $id)->with(
                'success', 'Manager status of ' . $profile->firstname . ' ' . $profile->lastname . ' changed.'
            );
        }

        return redirect('/users' . $id)->with(
            'fail', 'Could not change manager status of ' . $profile->firstname . ' ' . $profile->lastname . '.'
        );
    }
}