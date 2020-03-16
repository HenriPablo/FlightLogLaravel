<table class="table table-responsive" id="aircrafts-table">
    <thead>
        <tr>
            <th>Aircraft Category</th>
        <th>Aircraft Class</th>
        <th>Aircraft Tail Number</th>
        <th>Aircraft Type</th>
        <th>Complex</th>
        <th>Hi Performance</th>
        <th>Nickname</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($aircrafts as $aircraft)
        <tr>
            <td>{!! $aircraft->aircraft_category !!}</td>
            <td>{!! $aircraft->aircraft_class !!}</td>
            <td>{!! $aircraft->aircraft_tail_number !!}</td>
            <td>{!! $aircraft->aircraft_type !!}</td>
            <td>{!! $aircraft->complex !!}</td>
            <td>{!! $aircraft->hi_performance !!}</td>
            <td>{!! $aircraft->nickname !!}</td>
            <td>
                {!! Form::open(['route' => ['aircrafts.destroy', $aircraft->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('aircrafts.show', [$aircraft->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-eye"></i></a>
                    <a href="{!! route('aircrafts.edit', [$aircraft->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-edit"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
