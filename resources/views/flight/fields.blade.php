<!-- DEVELOPMENT -->
{{--<script crossorigin src="https://unpkg.com/react@16/umd/react.development.js" ></script>--}}
{{--<script crossorigin src="https://unpkg.com/react-dom@16/umd/react-dom.development.js" ></script>--}}

<!--
PRODUCTION
{{--<script crossorigin src="https://unpkg.com/react@16/umd/react.production.min.js"></script>--}}
{{--<script crossorigin src="https://unpkg.com/react-dom@16/umd/react-dom.production.min.js"></script>--}}
-->

<!-- Flight -->


<div class="form-group col-sm-6">
    {!! Form::label('id', 'ID:') !!}
    {!! Form::text('id', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('date', 'Date:') !!}
    {!! Form::text('date', null, ['class'=>'form-control']) !!}
</div>

{{--<div class="form-group col-sm-6">--}}
{{--    {!! Form::label('aircraft_id', 'Aircraft:') !!}--}}
{{--    {!! Form::text('aircraft_id', null, ['class'=>'form-control']) !!}--}}
{{--</div>--}}

<div class="form-group col-sm-6">
    {!! Form::label('aircraft', 'Aircraft:') !!}
    <select class="form-control" name="aircraft_id" required id="aircraft_id">
        <option value="option_select" disabled>Aircraft</option>
        @foreach( $aircraft as $id => $cls)
            <option value="{{$id}}" {{ $id  == $flight->aircraft_id  ? 'selected' : ''}}>{{ $cls }}</option>
        @endforeach
    </select>
</div>

<div class="form-group col-sm-6">
    {!! Form::label('departure', 'Departure:') !!}
{{--    {!! Form::text('departure', null, ['class'=>'form-control']) !!}--}}

    <select class="form-control" name="departure" required id="departure">
        @foreach( $airport as $id => $ico_id)
            <option value="{{$ico_id}}" {{ $ico_id == $flight->departure ? 'selected' : '' }}>{{$id}}</option>
        @endforeach
    </select>

</div>

<div class="form-group col-sm-6">
    {!! Form::label('route', 'Route:') !!}
    {!! Form::text('route', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('destination', 'Destination:') !!}
{{--    {!! Form::text('destination', null, ['class'=>'form-control']) !!}--}}

    <select class="form-control" name="destination" required id="destination">

        @foreach( $airport as $id => $ico_id)
            <option value="{{$ico_id}}" {{ $ico_id == $flight->destination ? 'selected' : '' }}>{{$id}}</option>
        @endforeach
    </select>
</div>

<div class="form-group col-sm-6">
    {!! Form::label('remarks', 'Remarks:') !!}
    {!! Form::textarea('remarks', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('no_inst_approaches', 'No. Inst. Approaches:') !!}
    {!! Form::text('no_ins_approaches', 0, ['class'=>'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('no_day_landings', 'No. Day Landings:') !!}
    {!! Form::text('no_day_landings', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('no_night_landings', 'No. Night Landings:') !!}
    {!! Form::text('no_night_landings', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('as_flight_instructor') !!}
    {!! Form::text('as_flight_instructor', 0, ['class'=>'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('cross_country') !!}
    {!! Form::text('cross_country', 0, ['class'=>'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('daytime', 'Daytime:') !!}
    {!! Form::text('daytime', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('nighttime', 'Nighttime:') !!}
    {!! Form::text('nighttime', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('actual_instrument', 'Actual Instrument') !!}
    {!! Form::text('actual_instrument', 0, ['class'=>'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('simulated_instrument', 'Simulated Instrument') !!}
    {!! Form::text('simulated_instrument', 0, ['class'=>'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('ground_trainer', 'Ground Trainer') !!}
    {!! Form::text('ground_trainer', 0, ['class'=>'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('dual_received', 'Dual Received') !!}
    {!! Form::text('dual_received', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('pilot_in_command', 'PIC') !!}
    {!! Form::text('pilot_in_command', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('second_in_command', 'SIC') !!}
    {!! Form::text('second_in_command', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('total_duration_of_flight', 'Total Duration of Flight') !!}
    {!! Form::text('total_duration_of_flight', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('extended_flight_details', 'Extended Flight Details') !!}
    {!! Form::textarea('extended_flight_details', null, ['class'=>'form-control']) !!}
</div>




<!-- Submit Field -->
<div class="form-group col-sm-12">
    <div id="root" class="form-group col-sm-12"></div>
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('flight.index') !!}" class="btn btn-default">Cancel</a>
</div>
<!-- COLUMNS
    id
    date
    aircraft_id
    departure
    route
    destination
    remarks
    no_inst_aproaches
    no_day_landings
    no_night_landings

**airplane-single-engine-land
**airplane-multi-engine-land
**rotorcraft-helicopter

    as_flight_instructor
    cross_country
    daytime
    nighttime
    actual_instrument
    simulated_instrument
    ground_trainer
    dual_received
    pilot_in_command
    second_in_command
    total_duration_of_flight

extended_flight_details_id

-->


<div id="example"></div>
<script src="{{asset('js/app.js')}}"></script>
