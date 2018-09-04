<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $crewmember->id !!}</p>
</div>

<!-- Crewmember Field -->
<div class="form-group">
    {!! Form::label('class', 'Class:') !!}
    <p>{!! $crewmember->first_name !!}</p>
</div>

<?php
    var_dump($crewmember->crewmemberTypes->toArray() );
    ?>







