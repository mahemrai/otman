@extends('app')

@section('content')

    @include('app.partials.user-menu', array('user' => $user))

    <h1>Change your email address</h1>

    @include('app.partials.errors')

    {!! Form::open(array('class' => 'form-horizontal', 'url' => 'my-email/' . $user->id . '/edit', 'method' => 'PATCH')) !!}
        <div class="form-group">
            {!! Form::label('email', 'Email:', array('class' => 'col-sm-2 control-label')) !!}
            <div class="col-sm-10">
                {!! Form::email('email', (isset($user->email)) ? $user->email : '', array('class' => 'form-control')) !!}
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-2"></div>
            <div class="col-sm-10">
                {!! Form::submit('Update', array('class' => 'btn btn-primary')) !!}
            </div>
        </div>

    {!! Form::close() !!}
@stop