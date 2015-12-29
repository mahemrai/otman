<modal show="@{{@showPasswordModal}}" effect="fade" width="600">
    <div class="modal-header">
        <h4 class="modal-title">Change your password</h4>
    </div>

    <div class="modal-body">
        {!! Form::open(array('class' => 'form-horizontal')) !!}
            <div class="form-group">
                <div class="col-sm-4"></div>
                <div class="col-sm-8">
                    {!! Form::hidden('user_id', (isset($user->id)) ? $user->id : '', array('class' => 'form-control', 'v-model' => 'user.id')) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('current_password', 'Current Password:', array('class' => 'col-sm-4 control-label')) !!}
                <div class="col-sm-8">
                    {!! Form::password('current_password', array('class' => 'form-control', 'v-model' => 'oldPassword')) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('password', 'New Password:', array('class' => 'col-sm-4 control-label')) !!}
                <div class="col-sm-8">
                    {!! Form::password('password', array('class' => 'form-control', 'v-model' => 'newPassword')) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('password_confirmation', 'Confirm Password:', array('class' => 'col-sm-4 control-label')) !!}
                <div class="col-sm-8">
                    {!! Form::password('password_confirmation', array('class' => 'form-control')) !!}
                </div>
            </div>
        {!! Form::close() !!}
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-default" v-on="click:showPasswordModal = false">Cancel</button>
        <button type="button" class="btn btn-primary" v-on="click:updatePassword">Update</button>
    </div>
</modal>