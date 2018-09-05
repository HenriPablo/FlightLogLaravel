
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

<h3>Crewmember Roles:</h3>
<ol>
    @foreach( $crt as $t)
        <p>ID: {{$t['id']}} ROLE: {{$t['role']}}</p>
        {{--@foreach( $t as $x=>$role)--}}
            {{--<p>{{$x}}</p>--}}
            {{--@foreach( $role as $z)--}}
            {{--<li>{{$value}}</li>--}}
                {{--@endforeach--}}
            {{--@endforeach--}}
    @endforeach
</ol>


<?php
echo('<hr/>');
var_dump($crewmemberType);
?>
<h3>All Roles:</h3>
<ul>
    @foreach( $crewmemberType as $id=>$role)
        <li>ID: {{$id}} ROLE: {{$role}}</li>
    @endforeach
</ul>


