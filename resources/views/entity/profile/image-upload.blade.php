@extends('app')

@section('content')

    <h1>Upload your profile image</h1>

    {!! Form::open(array('class' => 'form-horizontal', 'url' => 'profile-pic', 'method' => 'POST', 'files' => true)) !!}
        <div class="form-group">
            {!! Form::label('profile-image', 'Profile Image:', array('class' => 'col-sm-2 control-label')) !!}
            <div class="col-sm-10">
                {!! Form::file('profile-image') !!}
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-2"></div>
            <div class="col-sm-10">
                {!! Form::submit('Upload', array('class' => 'btn btn-primary')) !!}
            </div>
        </div>
    {!! Form::close() !!}

@stop