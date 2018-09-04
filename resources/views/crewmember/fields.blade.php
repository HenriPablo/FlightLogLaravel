
<!-- Crewmember Field -->
<div class="form-group col-sm-6">
    {!! Form::label('role', 'Crewmember:') !!}
    {!! Form::text('role', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('crewmember.index') !!}" class="btn btn-default">Cancel</a>
</div>
<hr style="display:block; clear:both;"/>
<?php
var_dump($crewmember->crewmemberTypes->toArray() );
echo('<hr/>');
var_dump($crewmemberType);
?>

