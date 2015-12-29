@extends('app')

@section('content')

    @include('app.partials.user-menu', array('user' => $user))

    @include('app.partials.success')

    <h1>Hello 
        @if (is_null($user->profile))
            {{ $user->email }}
        @else
            {{ $user->profile->firstname }} {{ $user->profile->lastname }}
        @endif
    </h1>

    @if (is_null($user->profile))
        <p>You have not set your profile. Please set your profile <a href="/profile">here</a>.</p>
    @else
        <p>Update your profile <a href="/profile/{{ $user->id }}/edit">here</a>.</p>
    @endif

@stop