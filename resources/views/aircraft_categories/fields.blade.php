
<!-- Aircraft Category Field -->
<div class="form-group col-sm-6">
    {!! Form::label('category', 'Aircraft Category:') !!}
    {!! Form::text('category', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('aircraft_category.index') !!}" class="btn btn-default">Cancel</a>
</div>
