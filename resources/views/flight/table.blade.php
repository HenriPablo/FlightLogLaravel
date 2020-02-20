<table class="table table-responsive" id="flight-table">
    <thead>
    <tr>
        <th>ID</th>
        <th>Date</th>
        <th>Aircraft</th>
        <th>Departure</th>
        <th>Destination</th>
        <th>Route</th>
{{--        <th>Remarks</th>--}}
{{--        <th>Extended Flt. Details</th>--}}
        <th>Instr. Approaches</th>
        <th>Day Landings</th>
        <th>Night Landings</th>
{{--        <th>As Instructor</th>--}}
{{--        <th>X-Country</th>--}}
{{--        <th>Daytime</th>--}}
{{--        <th>Nighttime</th>--}}
{{--        <th>Actual Instr.</th>--}}
{{--        <th>Sim. Instr.</th>--}}
{{--        <th>Ground Trainer</th>--}}
        <th>Dual</th>
        <th>PIC</th>
{{--        <th>SIC</th>--}}
        <th>Total</th>

        <th colspan="3">Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($flights as $flt)
        <tr>
            <td>{!! $flt->id !!}</td>
            <td>{!! $flt->date !!}</td>
            <td>{!! $flt->aircraft_id !!}</td>
            <td>{!! $flt->departure !!}</td>
            <td>{!! $flt->destination !!}</td>
            <td>{!! $flt->route !!}</td>
{{--            <td>{!! $flt->remarks !!}</td>--}}
{{--            <td>{!! $flt->extended_flight_details_id !!}</td>--}}
            <td>{!! $flt->no_inst_aproaches !!}</td>
            <td>{!! $flt->no_day_landings !!}</td>
            <td>{!! $flt->no_night_landings !!}</td>
{{--            <td>{!! $flt->as_flight_instructor !!}</td>--}}
{{--            <td>{!! $flt->cross_country !!}</td>--}}
{{--            <td>{!! $flt->daytime !!}</td>--}}
{{--            <td>{!! $flt->nighttime !!}</td>--}}
{{--            <td>{!! $flt->actual_instrument !!}</td>--}}
{{--            <td>{!! $flt->simulated_instrument !!}</td>--}}
{{--            <td>{!! $flt->ground_trainer !!}</td>--}}
            <td>{!! $flt->dual_received !!}</td>
            <td>{!! $flt->pilot_in_command !!}</td>
{{--            <td>{!! $flt->second_in_command !!}</td>--}}
            <td>{!! $flt->total_duration_of_flight !!}</td>


            <td>
                {!! Form::open(['route' => ['flight.destroy', $flt->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('flight.show', [$flt->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('flight.edit', [$flt->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
