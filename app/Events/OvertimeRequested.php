<?php
namespace Otman\Events;

use Otman\User;
use Otman\Overtime;
use Otman\Events\Event;

/**
 * @uses    Event
 * @package Otman
 * @author  Mahendra Rai
 */
class OvertimeRequested extends Event
{
    /**
     * @var \Otman\User
     */
    protected $user;

    /**
     * @var \Otman\Overtime
     */
    protected $overtime;

    /**
     * @param \Otman\User $user
     * @param \Otman\Overtime $overtime
     */
    public function __construct(User $user, Overtime $overtime)
    {
        $this->user = $user;
        $this->overtime = $overtime;
    }

    /**
     * @return \Otman\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @return \Otman\Overtime
     */
    public function getOvertime()
    {
        return $this->overtime;
    }
}