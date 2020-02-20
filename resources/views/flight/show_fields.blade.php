<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Flight ID:') !!}
    <p>{!! $flight->id !!}</p>
</div>

<td>{!! $flt->date !!}</td>

<!-- Aircraft ID Field -->
<div class="form-group">
    {!! Form::label('airfcraft_id', 'Aircraft ID:') !!}
    <p>{!! $flight->aircraft_id !!}</p>
</div>

<div class="form-group">
    {!! Form::label('departure', 'Departure:') !!}
    <p>{!! $flight->departure !!}</p>
</div>


<div class="form-group">
    {!! Form::label('destination', 'Destination:') !!}
    <p>{!! $flight->destination !!}</p></div>


<div class="form-group">
    {!! Form::label('route', 'Route:') !!}
    <p>{!! $flight->route !!}</p>
</div>


<div class="form-group">
    {!! Form::label('remarks', 'Remarks:') !!}
    <p>{!! $flight->remarks !!}</p>
</div>


<div class="form-group">
    {!! Form::label('extended_flight_details_id', 'Extended Remarks:') !!}
    <p>{!! $flight->extended_flight_details_id !!}</p>
</div>


<div class="form-group">
    {!! Form::label('no_inst_aproaches', 'No. Approaches:') !!}
    <p>{!! $flight->no_inst_aproaches !!}</p></div>


<div class="form-group">
    {!! Form::label('no_day_landings', 'Day Landings:') !!}
    <p>{!! $flight->no_day_landings !!}</p></div>


<div class="form-group">
    {!! Form::label('no_night_landings', 'Night Landings:') !!}
    <p>{!! $flight->no_night_landings !!}</p></div>


<div class="form-group">
    {!! Form::label('as_flight_instructor', 'Dual Given:') !!}
    <p>{!! $flight->as_flight_instructor !!}</p></div>


<div class="form-group">
    {!! Form::label('cross_country', 'X-Country:') !!}
    <p>{!! $flight->cross_country !!}</p></div>


<div class="form-group">
    {!! Form::label('daytime', 'Day:') !!}
    <p>{!! $flight->daytime !!}</p></div>


<div class="form-group">
    {!! Form::label('nighttime', 'Night:') !!}
    <p>{!! $flight->nighttime !!}</p></div>


<div class="form-group">
    {!! Form::label('actual_instrument', 'Actual Inst.:') !!}
    <p>{!! $flight->actual_instrument !!}</p></div>


<div class="form-group">
    {!! Form::label('simulated_instrument', 'Simulated Inst.:') !!}
    <p>{!! $flight->simulated_instrument !!}</p></div>


<div class="form-group">
    {!! Form::label('ground_trainer', 'Ground Trainer:') !!}
    <p>{!! $flight->ground_trainer !!}</p></div>


<div class="form-group">
    {!! Form::label('dual_received', 'Dual:') !!}
    <p>{!! $flight->dual_received !!}</p></div>


<div class="form-group">
    {!! Form::label('pilot_in_command', 'PIC:') !!}
    <p>{!! $flight->pilot_in_command !!}</p></div>

<div class="form-group">
    {!! Form::label('second_in_command', 'SIC:') !!}
    <p>{!! $flight->second_in_command !!}</p></div>


<div class="form-group">
    {!! Form::label('total_duration_of_flight', 'Total:') !!}
    <p>{!! $flight->total_duration_of_flight !!}</p>
</div>







