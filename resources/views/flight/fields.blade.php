<style>
    .box{
        border-top-width:0;
        border-left-width: 0;
        border-bottom-width:0;
        border-left-width: 0;
        border-radius: 0!important;

        padding: 0!important;
    }

    .box-body{
        padding-left:0!important;
    }

    section.content-header{
        /*padding-left:0;*/
        padding-bottom: 0!important;
    }

    form > div.row {
        padding-top:1rem;
        /*border: 1px solid red;*/
    }

    .row{
        margin-left:0;
        margin-right:0;
    }

    .remarks-row{
        background: #e8e8e8;
    }
    .remarks{
        flex: 0 0 11.11%;
        max-width:11.11%;
        /*background: #8db863;*/
        text-align: right;
    }

    .remarks-text-area
    {
        flex: 0 0 88.89%;
        max-width: 88.89%;
    }
</style>

<div class="row">

    <div class="col-sm-4">
        <div class="form-group row">
            {!! Form::label('id', 'ID:', ['class'=>'col-sm-4 col-form-label text-right']) !!}
            <div class="col-sm-8">
                {!! Form::text('id', null, ['class' => 'form-control', 'readonly']) !!}
            </div>
        </div>
    </div>

    <div class="col-sm-4">
        <div class="form-group row">
            {!! Form::label('date', 'Date:', ['class'=>'col-sm-4 col-form-label text-right']) !!}
            <div class="col-sm-8">
                {!! Form::text('date', null, ['class'=>'form-control']) !!}
            </div>
        </div>
    </div>

    <div class="col-sm-4">
        <div class="form-group row">
            {!! Form::label('aircraft', 'Aircraft:',  ['class'=>'col-sm-4 col-form-label text-right']) !!}

            <div class="col-sm-8">
                <select class="form-control" name="aircraft_id" required id="aircraft_id">
                    @foreach( $aircraft as $id => $cls)
                        <option value="{{$id}}" {{ $id  == $flight->aircraft_id  ? 'selected' : ''}}>{{ $cls }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

</div>



<div class="row">
    <div class="col-sm-4">
        <div class="form-group row">{!! Form::label('departure', 'Departure:', ['class'=>'col-sm-4 col-form-label text-right']) !!}
            <div class="col-sm-8">
                <select class="form-control" name="departure" required id="departure">
                    @foreach( $airport as $id => $ico_id)
                        <option
                            value="{{$ico_id}}" {{ $ico_id == $flight->departure ? 'selected' : '' }}>{{$id}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    <div class="col-sm-4">
        <div class="form-group row">{!! Form::label('route', 'Route:', ['class'=>'col-sm-4 col-form-label text-right']) !!}
            <div class="col-sm-8">
                {!! Form::text('route', null, ['class'=>'form-control']) !!}
            </div>
        </div>
    </div>

    <div class="col-sm-4">
        <div class="form-group row">{!! Form::label('destination', 'Destination:', ['class'=>'col-sm-4 col-form-label text-right']) !!}
            <div class="col-sm-8">
                <select class="form-control" name="destination" required id="destination">
                    @foreach( $airport as $id => $ico_id)
                        <option
                            value="{{$ico_id}}" {{ $ico_id == $flight->destination ? 'selected' : '' }}>{{$id}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
</div>

<div class="row remarks-row">
    <div class="col">
        <div class="form-group row">
            {!! Form::label('remarks', 'Remarks:', ['class'=>'col-sm-4 col-form-label, text-right, remarks']) !!}
            <div class="col-sm-8 remarks-text-area">
                {!! Form::textarea('remarks', null, ['class'=>'form-control']) !!}
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-sm-4">
        <div class="form-group row">
            {!! Form::label('no_inst_approaches', 'No. Inst. Approaches:', ['class'=>'col-sm-4 col-form-label text-right']) !!}
            <div class="col-sm-8">
                {!! Form::text('no_ins_approaches', 0, ['class'=>'form-control']) !!}
            </div>
        </div>
    </div>

    <div class="col-sm-4">
        <div class="form-group row">
            {!! Form::label('no_day_landings', 'No. Day Landings:', ['class'=>'col-sm-4 col-form-label text-right']) !!}
            <div class="col-sm-8">
                {!! Form::text('no_day_landings', null, ['class'=>'form-control']) !!}</div>
        </div>
    </div>

    <div class="col-sm-4">
        <div class="form-group raw">
            {!! Form::label('no_night_landings', 'No. Night Landings:', ['class'=>'col-sm-4 col-form-label text-right']) !!}
            <div class="col-sm-8">{!! Form::text('no_night_landings', null, ['class'=>'form-control']) !!}</div>
        </div>
    </div>
    
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
