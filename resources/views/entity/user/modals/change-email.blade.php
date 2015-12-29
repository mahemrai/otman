<modal show="@{{@showEmailModal}}" effect="fade" width="400">
    <div class="modal-header">
        <h4 class="modal-title">Change your email</h4>
    </div>

    <div class="modal-body">
        {!! Form::open(array('class' => 'form-horizontal', 'url' => 'my-email/' . $user->id . '/edit', 'method' => 'PATCH')) !!}
            <div class="form-group">
                <div class="col-sm-2"></div>
                <div class="col-sm-10">
                    {!! Form::hidden('user_id', (isset($user->id)) ? $user->id : '', array('class' => 'form-control', 'v-model' => 'user.id')) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('email', 'Email:', array('class' => 'col-sm-2 control-label')) !!}
                <div class="col-sm-10">
                    {!! Form::email('email', (isset($user->email)) ? $user->email : '', array('class' => 'form-control', 'v-model' => 'user.email')) !!}
                </div>
            </div>
        {!! Form::close() !!}
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-default" v-on="click:showEmailModal = false">Cancel</button>
        <button type="button" class="btn btn-primary" v-on="click:updateEmail">Update</button>
    </div>
</modal>