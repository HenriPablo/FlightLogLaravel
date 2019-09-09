
<!-- Aircraft Class Field -->
<div class="form-group col-sm-6">
    {!! Form::label('class', 'Aircraft Class:') !!}
    {!! Form::text('class', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('aircraft_class.index') !!}" class="btn btn-default">Cancel</a>
</div>
