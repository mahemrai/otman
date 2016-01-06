<?php
namespace Otman;

use Illuminate\Database\Eloquent\Model;

/**
 * @uses \Illuminate\Database\Eloquent\Model
 * @package Otman
 * @author Mahendra Rai
 */
class Overtime extends Model
{
    const STATUS_PENDING = 'Pending';
    const STATUS_APPROVED = 'Approved';
    const STATUS_LOGGED = 'Logged';
    const STATUS_COMPLETED = 'Completed';
    const STATUS_IN_REVIEW = 'In Review';

    /**
     * @var string
     */
    protected $table = 'overtime';

    /**
     * @var Array
     */
    protected $fillable = array(
        'user_id',
        'line_manager',
        'request_date',
        'description',
        'logged_time',
        'status'
    );
}