<?php
namespace Otman\Http\Controllers\App;

use Otman\User;
use Validator;
use Otman\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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
        return view('app.dashboard', array(
            'user' => Auth::user()
        ));
    }
}