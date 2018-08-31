<table class="table table-responsive" id="flight-table">
    <thead>
    <tr>
        <th>Flight</th>
        <th colspan="3">Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($flights as $category)
        <tr>
            <td>{!! $category->departure !!}</td>
            <td>
                {!! Form::open(['route' => ['flight.destroy', $category->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('flight.show', [$category->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('flight.edit', [$category->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
