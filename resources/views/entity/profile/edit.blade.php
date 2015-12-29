@extends('app')

@section('content')

    @include('app.partials.user-menu', array('user' => $user))

    <h1>Update your details</h1>

    @include('app.partials.errors')

    @include('app.partials.fail')

    {!! Form::open(array('class' => 'form-horizontal', 'url' => 'profile/' . $user->id . '/edit', 'method' => 'PATCH')) !!}
        @include('entity.profile.partials.profile-form', array('user' => $user, 'btnText' => 'Update'))
    {!! Form::close() !!}

@stop