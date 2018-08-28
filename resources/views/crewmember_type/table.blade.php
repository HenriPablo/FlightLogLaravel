<table class="table table-responsive" id="crewmember-type-table">
    <thead>
    <tr>
        <th>Crewmember Type</th>
        <th colspan="3">Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($crewmemberType as $class)
        <tr>
            <td>{!! $class->class !!}</td>
            <td>
                {!! Form::open(['route' => ['crewmember_type.destroy', $class->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('crewmember_type.show', [$class->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('crewmember_type.edit', [$class->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
