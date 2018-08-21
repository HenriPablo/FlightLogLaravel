<!-- Aircraft Category Field -->
<div class="form-group col-sm-6">
    {!! Form::label('aircraft_category', 'Aircraft Category:') !!}
    {!! Form::number('aircraft_category', null, ['class' => 'form-control']) !!}


    {!! var_dump('categories')     !!}

    <select class="js-states browser-default select2" name="shopping_id" required id="shopping_id">
        <option value="option_select" disabled selected>Shoppings</option>
        @foreach('categories' as $category)
            <option value="{{ $category->id }}" {{$category->category == $aircraft_category->id  ? 'selected' : ''}}>{{ $category->$category}}</option>
        @endforeach
    </select>
</div>

<!-- Aircraft Class Field -->
<div class="form-group col-sm-6">
    {!! Form::label('aircraft_class', 'Aircraft Class:') !!}
    {!! Form::number('aircraft_class', null, ['class' => 'form-control']) !!}
</div>

<!-- Aircraft Tail Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('aircraft_tail_number', 'Aircraft Tail Number:') !!}
    {!! Form::text('aircraft_tail_number', null, ['class' => 'form-control']) !!}
</div>

<!-- Aircraft Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('aircraft_type', 'Aircraft Type:') !!}
    {!! Form::text('aircraft_type', null, ['class' => 'form-control']) !!}
</div>

<!-- Complex Field -->
<div class="form-group col-sm-6">
    {!! Form::label('complex', 'Complex:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('complex', false) !!}
        {!! Form::checkbox('complex', '1', null) !!} 1
    </label>
</div>

<!-- Hi Performance Field -->
<div class="form-group col-sm-6">
    {!! Form::label('hi_performance', 'Hi Performance:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('hi_performance', false) !!}
        {!! Form::checkbox('hi_performance', '1', null) !!} 1
    </label>
</div>

<!-- Nickname Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nickname', 'Nickname:') !!}
    {!! Form::text('nickname', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('aircrafts.index') !!}" class="btn btn-default">Cancel</a>
</div>
