<p>Hello {{ $user->getManager()->profile->firstname }} {{ $user->getManager()->profile->lastname }},</p>

<p>{{ $user->profile->firstname }} {{ $user->profile->lastname }} has requested a new overtime.</p>

<p>
    <b>Details</b><br>
    Date - {{ $overtime->request_date }} <br>
    Description - {{ $overtime->description }}
</p>

<p>Please review the request and approve/reject them here.</p>