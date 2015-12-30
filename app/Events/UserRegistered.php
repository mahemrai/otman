<?php
namespace Otman\Events;

use Otman\User;
use Otman\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

/**
 * @package Otman
 * @uses    \Otman\Events\Event
 * @author  Mahendra Rai
 */
class UserRegistered extends Event
{
    use SerializesModels;

    /**
     * @var \Otman\User
     */
    protected $user;

    /**
     * @param \Otman\User
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * @return \Otman\User
     */
    public function getUser()
    {
        return $this->user;
    }
}