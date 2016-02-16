@if ($user->role === 'admin')

    <ul>
        <li><a href="/users">Users</a></li>
        <li>OT</li>
        <li>Report</li>
    </ul>

@else

    <ul>
        <li><a href="/user/{{ $user->id }}/overtime">Request OT</a></li>
        <li>Pending OT Requests</li>
        <li>Log your OT</li>
        <li>History</li>
    </ul>
    
@endif