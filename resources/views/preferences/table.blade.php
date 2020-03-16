<table class="table table-responsive" id="preferences-table">
    <thead>
    <tr>
        <th>ID</th>
        <th>Always Assign Self</th>
    </tr>

    </thead>
    <tbody>
    @foreach( $preferences as $pr)
        <tr>
            <td>{!! $pr->id !!}</td>
            <td>{!! $pr->alwaysRenderSelf !!}</td>
            <td>
                {!! Form::open() !!}
                    <div class="btn-group">
                        <a href="{!! route('preferences.show', [$pr->id]) !!}" class="btn btn-default btn-xs"><i class="fa fa-eye"></i></a>
                        <a href="{!! route('preferences.edit', [$pr->id]) !!}" class="btn btn-default btn-xs"><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type'=>'submit', 'class'=>'btn btn-danger btn-xs', 'onclick'=>"return confirm(('Are you sure?')"]) !!}
                    </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
