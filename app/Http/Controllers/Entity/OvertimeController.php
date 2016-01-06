<?php
namespace Otman\Http\Controllers\Entity;

use Event;

use Otman\User;
use Otman\Overtime;
use Otman\Events\OvertimeRequested;
use Otman\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * @uses    \Otman\Http\Controllers\Controller
 * @package Otman
 * @author  Mahendra Rai
 */
class OvertimeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @param  int $userId
     * @return \Otman\Http\Response
     */
    public function newOvertime($userId)
    {
        $user = User::find($userId);
        return view('entity.overtime.new')->with('user', $user);
    }

    /**
     * @param  int $userId
     * @return \Otman\Http\Request
     */
    public function create($userId, Request $request)
    {
        $this->validate($request, array(
            'request_date' => 'required',
            'description'  => 'required'
        ));

        $user = User::find($userId);

        $overtime = new Overtime();
        $overtime->user_id = $userId;
        $overtime->request_date = $request->request_date;
        $overtime->description = $request->description;
        $overtime->status = Overtime::STATUS_PENDING;

        if ($overtime->save()) {
            Event::fire(new OvertimeRequested($user, $overtime));
            return redirect('dashboard')->with('success', 'Your overtime request was successfully submitted.');
        }

        return view('entity.overtime.new')->with('fail', 'Your overtime request could not be submitted. Please try again.');
    }
}