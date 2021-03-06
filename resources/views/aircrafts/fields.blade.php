<div class="form-group col-sm-6">
    <label for="aircraft_category">Aircraft Category:</label>
    <select class="form-control" name="aircraft_category" required id="aircraft_category">
        <option value="option_select" disabled>Aircraft Categories</option>
        @foreach( $categories as $id => $category)
            <option value="{{ $id }}" {{ $aircraft->aircraft_category  == $id  ? 'selected' : ''}}>{{ $category}}</option>
        @endforeach
    </select>
</div>

<div class="form-group col-sm-6">
    <label for="aircraft_category">Aircraft Class:</label>
    <select class="form-control" name="aircraft_class" required id="aircraft_class">
        <option value="option_select" disabled>Aircraft Categories</option>
        @foreach( $classes as $id => $cls)
            <option value="{{ $id }}" {{ $aircraft->aircraft_class  == $id  ? 'selected' : ''}}>{{ $cls}}</option>
        @endforeach
    </select>
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
