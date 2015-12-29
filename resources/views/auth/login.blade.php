@extends('app')

@section('content')

    @include('app.partials.errors')

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
            <div class="col-sm-2"></div>
            <div class="col-sm-10">
                {!! Form::submit('Login', array('class' => 'btn btn-primary')) !!}
            </div>
        </div>
    {!! Form::close() !!}
@endsection