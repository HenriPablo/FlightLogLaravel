
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

<?php
//var_dump($crewmember->crewmemberTypes->toArray() );
$crt = $crewmember->crewmemberTypes->toArray();
?>
{{--<h3>Crewmember Roles:</h3>--}}
{{--<ol>--}}
    {{--@foreach( $crt as $t)--}}
        {{--<p>ID: {{$t['id']}} ROLE: {{$t['role']}}</p>--}}
    {{--@endforeach--}}
{{--</ol>--}}
{{--var_dump($crewmemberType);--}}
{{--<ul>--}}
    {{--@foreach( $crewmemberType as $id=>$role)--}}
        {{--<li>ID: {{$id}} ROLE: {{$role}}</li>--}}
    {{--@endforeach--}}
{{--</ul>--}}
<?php $selected = '';?>
<div class="form-group col-sm-6">
    <label for="crewmember_type">Crewmember Roles:</label>
    <select class="form-control" name="crewmember_type" multiple required id="crewmember_type">
        @foreach( $crewmemberType as $id=>$role )
            @foreach( $crt as $t)
                @if( $t['id'] == $id )
                    @php $selected = 'selected' @endphp
                @endif
            @endforeach
            <option value="{{$id}}" {{$selected}}>{{$role}}</option>
                @php $selected = '' @endphp
        @endforeach
    </select>
</div>

<!-- CREWMEMBER COLUMNS

id
address1
address2
phone
certificate_no
city
email
first_name
last_name
notes
state
zip
class
display_email
enabled
password
username
self
crewmember_pkey
crewmember_pkey

-->
