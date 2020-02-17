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
    {!! Form::text('category', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('date', 'Date:') !!}
    {!! Form::text('date', null, ['class'=>'form-control']) !!}
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
    {!! Form::label('no_day_landings', 'No. Day Landings:') !!}
    {!! Form::text('no_day_landings', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('no_night_landings', 'No. Night Landings:') !!}
    {!! Form::text('no_night_landings', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('no_inst_approaches', 'No. Inst. Approaches:') !!}
    {!! Form::text('no_ins_approaches', 0, ['class'=>'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    <div id="root" class="form-group col-sm-12"></div>
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('flight.index') !!}" class="btn btn-default">Cancel</a>
</div>
<!-- COLUMNS
id
actual_instrument
aircraft_id
as_flight_instructor
cross_country
date
daytime
departure
destination
dual_received
extended_flight_details_id
ground_trainer
nighttime
no_day_landings
no_inst_aproaches
no_night_landings
pilot_in_command
remarks
route
second_in_command
simulated_instrument
total_duration_of_flight
flight_pkey
aircraft_id_fk
departure_fk
destination_fk
extended_flight_details_fk

-->


<div id="example"></div>
<script src="{{asset('js/app.js')}}"></script>
