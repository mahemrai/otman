@if ($user->role === 'admin')

    <ul>
        <li>Users</li>
        <li>OT</li>
        <li>Report</li>
    </ul>

@else

    <ul>
        <li>Request OT</li>
        <li>Pending OT Requests</li>
        <li>Log your OT</li>
        <li>History</li>
    </ul>
    
@endif