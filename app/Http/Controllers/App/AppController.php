<?php
namespace Otman\Http\Controllers\App;

use Otman\User;
use Validator;
use Otman\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

/**
 * @uses    \Otman\Http\Controllers\Controller
 * @package Otman
 * @author  Mahendra Rai
 */
class AppController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     * 
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        $overtimes = Auth::user()->overtimes->take(5);
        $data = array(
            'user'  => Auth::user()
        );
        return view('app.dashboard', $data);
    }

    /**
     * Display list of users of the application.
     * 
     * @return \Illuminate\Http\Response 
     */
    public function users()
    {
        if (strcasecmp(Auth::user()->role, 'admin') == 0) {
            $users = User::where('id', '!=', Auth::user()->id)->get();
            $data = array(
                'user'  => Auth::user(),
                'users' => $users
            );
            return view('app.users', $data);
        }
        return redirect('/login');
    }
}