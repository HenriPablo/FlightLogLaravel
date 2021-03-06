<table class="table table-responsive" id="aircraft-category-table">
    <thead>
    <tr>
        <th>Category</th>
        <th colspan="3">Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($aircraftCategories as $category)
        <tr>
            <td>{!! $category->category !!}</td>
            <td>
                {!! Form::open(['route' => ['aircraft_category.destroy', $category->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('aircraft_category.show', [$category->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-eye"></i></a>
                    <a href="{!! route('aircraft_category.edit', [$category->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-edit"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
