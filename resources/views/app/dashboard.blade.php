@extends('app')

@section('jscripts')
    <script src="/js/app/log-time.js"></script>
@stop

@section('content')

    @include('app.partials.user-menu', array('user' => $user))

    <div class="col-md-12">

        <div class="col-md-3" style="height:100%">
            @include('app.partials.app-menu', array('user' => $user))
        </div>

        <div class="col-md-9">
            <div class="col-md-12">
                @include('app.partials.success')
                @include('app.partials.fail')

                <h1>Hello 
                    @if (is_null($user->profile))
                        {{ $user->email }}
                    @else
                        {{ $user->profile->firstname }} {{ $user->profile->lastname }}
                    @endif
                </h1>

                @if (is_null($user->profile))
                    <p>You have not set your profile. Please set your profile <a href="/profile">here</a>.</p>
                @else
                    <p>Update your profile <a href="/profile/{{ $user->id }}/edit">here</a>.</p>
                @endif
            </div>

            <div class="col-md-12" id="log-time" data-user="{{ $user->id }}">
                <h2>Your recent overtime requests</h2>

                <table class="table">
                    <tbody>
                        <tr v-repeat="overtimes">
                            <td>@{{ request_date }}</td>
                            <td>@{{ status }}</td>
                            <td v-if="status === 'Approved'">
                                <a v-on="click:loadOvertime(id)">Log time</a>
                            </td>
                            <td v-if="status === 'Completed'">Time has been logged</td>
                            <td v-if="status === 'Pending'">No action to take</td>
                        </tr>
                    </tbody>
                </table>

                <modal show="@{{@showModal}}" effect="fade" width="400">
                    <div class="modal-header">
                        <h4 class="modal-title">Log your Overtime</h4>
                    </div>
                    <div class="modal-body">
                        <p><b>Requested Date:</b></p>
                        <p v-model="overtime">@{{overtime.request_date}}</p>
                        <p><b>Task you worked on:</b></p>
                        <p v-model="overtime">@{{overtime.description}}</p>
                        <input class="form-control" v-model="timeLog"/>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" v-on='click:showModal = false'>Exit</button>
                        <button type="button" class="btn btn-success" v-on='click:logTime()'>Save</button>
                    </div>
                </modal>

                <alert show="@{{@showSuccessAlert}}" duration="3000" type="success" width="400px" placement="top-right" dismissable>
                    <span class="icon-ok-circled alert-icon-float-left"></span>
                    <strong>@{{@alertMessage}}</strong>
                </alert>
            </div>
        </div>
    </div>

@stop