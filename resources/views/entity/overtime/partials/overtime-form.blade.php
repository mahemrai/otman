<div class="form-group">
    {!! Form::label('request_date', 'Day of request:', array('class' => 'col-md-2 control-label')) !!}
    <div class="col-md-10">
        <datepicker name="request_date" v-ref="dp" value="@{{@value}}" disabled-days-of-Week="@{{disabled}}"
      format="@{{format.toString()}}"></datepicker>
        <input type="text" name="request_date" value="@{{@value}}">
    </div>
</div>

<div class="form-group">
    {!! Form::label('description', 'Description:', array('class' => 'col-md-2 control-label')) !!}
    <div class="col-md-10">
        {!! Form::textarea('description', null, array('class' => 'form-control')) !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-2"></div>
    <div class="col-md-10">
        {!! Form::submit($btnText, array('class' => 'btn btn-primary')) !!}
    </div>
</div>