@extends('app')

@section('content')

    @include('app.partials.user-menu', array('user' => Auth::User()))

    <h1>Enter your details</h1>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (isset($fail))
        <div class="alert alert-danger">
            <p>{{ $fail }}</p>
        </div>
    @endif

    {!! Form::open(array('class' => 'form-horizontal', 'url' => 'profile', 'method' => 'POST')) !!}
        @include('entity.profile.partials.profile-form', array('user' => (isset($user)) ? $user : '', 'btnText' => 'Save'))
    {!! Form::close() !!}
@stop