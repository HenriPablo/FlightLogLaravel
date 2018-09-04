
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
$crt = $crewmember->crewmemberTypes->toArray();
?>

<ol>
    @foreach( $crt as $t)
        <li>{{$t}}</li>
    @endforeach
</ol>


<?php
echo('<hr/>');
var_dump($crewmemberType);
?>
<ul>
    @foreach( $crewmemberType as $type=>$role)
        <li>{{$role}}</li>
    @endforeach
</ul>


