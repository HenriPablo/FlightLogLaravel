
<!-- Crewmember Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('role', 'Crewmember Type:') !!}
    {!! Form::text('role', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('crewmember_type.index') !!}" class="btn btn-default">Cancel</a>
</div>
