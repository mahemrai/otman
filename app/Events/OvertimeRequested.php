<?php
namespace Otman\Events;

use Otman\User;
use Otman\Overtime;
use Otman\Events\Event;

class OvertimeRequested extends Event
{
    protected $user;

    protected $overtime;

    public function __construct(User $user, Overtime $overtime)
    {
        $this->user = $user;
        $this->overtime = $overtime;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function getOvertime()
    {
        return $this->overtime;
    }
}