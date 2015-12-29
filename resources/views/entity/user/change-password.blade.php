@extends('app')

@section('content')

    @include('app.partials.user-menu', array('user' => $user))

    <h1>Change your password</h1>

    @include('app.partials.errors')

    {!! Form::open(array('class' => 'form-horizontal', 'url' => 'my-password/' . $user->id . '/edit', 'method' => 'PATCH')) !!}
        <div class="form-group">
            {!! Form::label('current_password', 'Current Password:', array('class' => 'col-sm-2 control-label')) !!}
            <div class="col-sm-10">
                {!! Form::password('current_password', array('class' => 'form-control')) !!}
            </div>
        </div>
        
        <div class="form-group">
            {!! Form::label('password', 'New Password:', array('class' => 'col-sm-2 control-label')) !!}
            <div class="col-sm-10">
                {!! Form::password('password', array('class' => 'form-control')) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('password_confirmation', 'Confirm Password:', array('class' => 'col-sm-2 control-label')) !!}
            <div class="col-sm-10">
                {!! Form::password('password_confirmation', array('class' => 'form-control')) !!}
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-2"></div>
            <div class="col-sm-10">
                {!! Form::submit('Change', array('class' => 'btn btn-primary')) !!}
            </div>
        </div>
    {!! Form::close() !!}
@stop