<?php
namespace Otman\Listeners;

use Illuminate\Mail\Mailer;
use Otman\Events\UserRegistered;

/**
 * @package Otman
 * @author  Mahendra Rai
 */
class EmailRegistrationConfirmation
{
    /**
     * @var \Illuminate\Mail\Mailer
     */
    protected $mailer;

    /**
     * @param Mail $mail
     */
    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    /**
     * @param \Otman\Events\UserRegistered $event
     */
    public function handle(UserRegistered $event)
    {
        $user = $event->getUser();

        $data = array(
            'user' => $user
        );

        $this->mailer->send('emails.registration', $data, function ($message) use ($user) {
            $message->from('noreply@otman.org', 'OT Manager');
            $message->to($user->email, 'Anonymous User')
                    ->subject('Welcome!');
        });
    }
}