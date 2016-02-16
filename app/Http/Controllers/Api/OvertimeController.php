<?php
namespace Otman\Http\Controllers\Api;

use Validator;

use Otman\Overtime;
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
    }

    /**
     * @param  int $id
     * @return array
     */
    public function get($userId = null, $overtimeId = null)
    {
        if (is_null($overtimeId)) {
            $overtimes = Overtime::where('user_id', $userId)
                            ->orderBy('created_at', 'desc')
                            ->take(5)
                            ->get();

            return array(
                'code'      => 1,
                'status'    => 'ok',
                'overtimes' => $overtimes
            );
        } else {
            $overtime = Overtime::find($overtimeId);
            return array(
                'code'     => 1,
                'status'   => 'ok',
                'overtime' => $overtime
            );
        }
    }

    /**
     * @param  int $id
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function logTime($id, Request $request)
    {
        $validator = Validator::make($request->all(), array(
            'time' => 'required|date_format:g:i'
        ));

        if ($validator->fails()) {
            return array(
                'code'    => 3,
                'status'  => 'Validation failed',
                'message' => $validator->errors()
            );
        }

        $overtime = Overtime::find($id);
        $overtime->logged_time = $request->time;
        $overtime->status = Overtime::STATUS_COMPLETED;

        if ($overtime->save()) {
            return array(
                'code'    => 1,
                'status'  => 'ok',
                'message' => 'Your overtime has been logged.'
            );
        } else {
            return array(
                'code'    => 2,
                'status'  => 'error',
                'message' => 'Cannot log your overtime. Try again.'
            );
        }
    }
}