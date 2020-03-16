<table class="table table-responsive" id="crewmember-table">
    <thead>
    <tr>
        <th>Crewmember</th>
        <th colspan="3">Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($crewmember as $crw)
        <tr>
            <td>{!! $crw->first_name !!}</td>
            <td>
                {!! Form::open(['route' => ['crewmember.destroy', $crw->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('crewmember.show', [$crw->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-eye"></i></a>
                    <a href="{!! route('crewmember.edit', [$crw->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-edit"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
