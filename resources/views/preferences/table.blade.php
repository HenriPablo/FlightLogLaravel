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
                        <a href="{!! route('preferences.show', [$pr->id]) !!}" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('preferences.edit', [$pr->id]) !!}" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type'=>'submit', 'class'=>'btn btn-danger btn-xs', 'onclick'=>"return confirm(('Are you sure?')"]) !!}
                    </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
