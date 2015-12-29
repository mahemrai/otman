<div class="form-group">
    {!! Form::label('salutation', 'Title:', array('class' => 'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! 
            Form::select('salutation', array(
                'null' => 'Select your title',
                'Mr'   => 'Mr',
                'Miss' => 'Miss',
                'Mrs'  => 'Mrs',
            ), (isset($user->profile->salutation)) ? $user->profile->salutation : 'null', array('class' => 'form-control')) 
        !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('firstname', 'Firstname:', array('class' => 'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('firstname', (isset($user->profile->firstname)) ? $user->profile->firstname : '', array('class' => 'form-control')) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('lastname', 'Lastname:', array('class' => 'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('lastname', (isset($user->profile->lastname)) ? $user->profile->lastname : '', array('class' => 'form-control')) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('job_title', 'Job Title:', array('class' => 'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('job_title', (isset($user->profile->job_title)) ? $user->profile->job_title : '', array('class' => 'form-control')) !!}
    </div>
</div>

<div class="form-group">
    <div class="col-sm-2"></div>
    <div class="col-sm-10">
        {!! Form::submit($btnText, array('class' => 'btn btn-primary')) !!}
    </div>
</div>