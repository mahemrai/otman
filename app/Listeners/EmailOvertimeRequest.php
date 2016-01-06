<?php
namespace Otman\Listeners;

use Otman\User;
use Illuminate\Mail\Mailer;
use Otman\Events\OvertimeRequested;

class EmailOvertimeRequest
{
    /**
     * @var \Illuminate\Mail\Mailer
     */
    protected $mailer;

    /**
     * @param \Illuminate\Mail\Mailer $mailer
     */
    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    /**
     * @param \Otman\Events\OvertimeRequested $event
     */
    public function handle(OvertimeRequested $event)
    {
        $manager = $event->getUser()->getManager();

        $data = array(
            'user'     => $event->getUser(),
            'overtime' => $event->getOvertime()
        );

        $this->mailer->send('emails.overtime_request', $data, function ($message) use ($manager) {
            $message->from('noreply@otman.org', 'OT Manager');
            $message->to($manager->email, $this->setMailingName($manager));
            $message->subject('New Overtime request submitted');
        });
    }

    /**
     * @param  \Otman\User
     * @return string
     */
    protected function setMailingName(User $user)
    {
        if (!is_null($user->profile)) {
            return $user->profile->firstname . ' ' . $user->profile->lastname;
        }

        return 'Anonymous User';
    }
}