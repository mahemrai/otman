@extends('app')

@section('content')

    @include('app.partials.user-menu', array('user' => $user))

    <div class="col-md-12">

        <div class="col-md-3" style="height:100%">
            @include('app.partials.app-menu', array('user' => Auth::User()))
        </div>

        <div class="col-md-9">
            <div class="col-md-12">
                @include('app.partials.success')
                @include('app.partials.fail')
                
                <h1>{{ $client->profile->firstname }} {{ $client->profile->lastname }} Profile</h1>

                <div class="col-md-6">
                    <img src="/images/profile-image/{{ $client->profile->profile_image }}">
                </div>

                <div class="col-md-6">
                    <p>Name: {{ $client->profile->salutation }} {{ $client->profile->firstname }} {{ $client->profile->lastname }}</p>
                    <p>Job Title: {{ $client->profile->job_title }}</p>
                    <p>Email: {{ $client->email }}</p>

                    {!! Form::open(array('method' => 'PATCH', 'url' => '/user/' . $client->id . '/role/edit')) !!}
                        @if ($client->role === 'admin')
                            {!! Form::hidden('role', 'user') !!}
                            {!! Form::submit('Revoke Admin Rights', array('class' => 'btn btn-default')) !!}
                        @else
                            {!! Form::hidden('role', 'admin') !!}
                            {!! Form::submit('Change to Admin', array('class' => 'btn btn-default')) !!}
                        @endif
                    {!! Form::close() !!}

                    {!! Form::open(array('method' => 'PATCH', 'url' => '/profile/' . $client->id . '/manager/edit')) !!}
                        @if ($client->profile->is_manager)
                            {!! Form::hidden('isManager', false) !!}
                            {!! Form::submit('Demote from Manager', array('class' => 'btn btn-default')) !!}
                        @else
                            {!! Form::hidden('isManager', true) !!}
                            {!! Form::submit('Promote to Manager', array('class' => 'btn btn-default')) !!}
                        @endif
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@stop