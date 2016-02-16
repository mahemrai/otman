@extends('app')

@section('content')
    @include('app.partials.user-menu', array('user' => $user))

    <div class="col-md-12">

        <div class="col-md-3" style="height:100%">
            @include('app.partials.app-menu', array('user' => $user))
        </div>

        <div class="col-md-9">
            <div class="col-md-12">
                <h2>Users</h2>

                <table class="table">
                    <thead>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Job Title</th>
                        <th>Joined Since</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->profile->firstname }} {{ $user->profile->lastname }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->profile->job_title }}</td>
                                <td>{{ $user->created_at }}</td>
                                <td><a class="btn btn-default" href="/users/{{ $user->id }}">View</a></td>
                                <td><a class="btn btn-default" href="/users/{{ $user->id }}/edit">Edit</a></td>
                                <td>
                                    {!! Form::open(['method' => 'DELETE', 'url' => '/users/' . $user->id]) !!}
                                        {!! Form::submit('Delete', ['class' => 'btn btn-default']) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop