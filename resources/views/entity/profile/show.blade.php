@extends('app')

@section('content')

    @include('app.partials.user-menu', array('user' => $user))

    <div>
	    <h1>Your profile</h1>

	    <img src="/images/profile-image/{{ $user->profile->profile_image }}">
	    <br>
	    <a href="/profile/{{ $user->id }}/edit">Edit your profile</a>
	    <a href="/my-email/{{ $user->id }}/edit">Change your email</a>
	    <a href="/my-password/{{ $user->id }}/edit">Change your password</a>
	    <p>Name: {{ $user->profile->salutation }} {{ $user->profile->firstname }} {{ $user->profile->lastname }}</p>
	    <p>Job Title: {{ $user->profile->job_title }}</p>
	    <p>Email: {{ $user->email }}</p>
	</div>

@stop