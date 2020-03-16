<table class="table table-responsive" id="airport-table">
    <thead>
    <tr>
        <th>Airport</th>
        <th colspan="3">Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($airports as $airport)
        <tr>
            <td>{!! $airport->ico_identifier !!}</td>
            <td>
                {!! Form::open(['route' => ['airport.destroy', $airport->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('airport.show', [$airport->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-eye"></i></a>
                    <a href="{!! route('airport.edit', [$airport->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-edit"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
