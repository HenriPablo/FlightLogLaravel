<table class="table table-responsive" id="aircraft-category-table">
    <thead>
    <tr>
        <th>Aircraft Class</th>
        <th colspan="3">Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($aircraftClass as $class)
        <tr>
            <td>{!! $class->class !!}</td>
            <td>
                {!! Form::open(['route' => ['aircraft_class.destroy', $class->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('aircraft_class.show', [$class->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-eye"></i></a>
                    <a href="{!! route('aircraft_class.edit', [$class->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-edit"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
