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

<div class="form-group col-sm-6">
    {!! Form::label('aircraft_id', 'Aircraft:') !!}
    {!! Form::text('aricraft_id', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('departure', 'Departure:') !!}
    {!! Form::text('departure', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('route', 'Route:') !!}
    {!! Form::text('route', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('destination', 'Destination:') !!}
    {!! Form::text('destination', null, ['class'=>'form-control']) !!}
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
