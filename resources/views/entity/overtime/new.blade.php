@extends('app')

@section('content')

    @include('app.partials.user-menu', array('user' => $user))

    <div class="col-md-12">
        <div class="col-md-3">
            @include('app.partials.app-menu', array('user' => $user))
        </div>

        <div class="col-md-8" id="datepicker">
            <h1>Overtime Request Form</h1>

            @include('app.partials.errors')

            @include('app.partials.fail')

            {!! Form::open(array('class' => 'form-horizontal', 'url' => 'user/' . $user->id . '/overtime', 'method' => 'POST')) !!}
                @include('entity.overtime.partials.overtime-form', array('user' => (isset($user)) ? $user : '', 'btnText' => 'Request'))
            {!! Form::close() !!}
        </div>
    </div>
@stop