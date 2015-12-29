@extends('app')

@section('content')
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {!! Form::open(array('class' => 'form-horizontal')) !!}
        <div class="form-group">
            {!! Form::label('email', 'Email:', array('class' => 'col-sm-2 control-label')) !!}
            <div class="col-sm-10">
                {!! Form::email('email', null, array('class' => 'form-control')) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('password', 'Password:', array('class' => 'col-sm-2 control-label')) !!}
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
                {!! Form::submit('Register', array('class' => 'btn btn-primary')) !!}
            </div>
        </div>
    {!! Form::close() !!}
@endsection