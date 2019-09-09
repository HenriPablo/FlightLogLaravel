<!-- DEVELOPMENT -->
{{--<script crossorigin src="https://unpkg.com/react@16/umd/react.development.js" ></script>--}}
{{--<script crossorigin src="https://unpkg.com/react-dom@16/umd/react-dom.development.js" ></script>--}}

<!--
PRODUCTION
{{--<script crossorigin src="https://unpkg.com/react@16/umd/react.production.min.js"></script>--}}
{{--<script crossorigin src="https://unpkg.com/react-dom@16/umd/react-dom.production.min.js"></script>--}}
-->

<!-- Flight -->
<div class="form-group col-sm-6">
    {!! Form::label('id', 'ID:') !!}
    {!! Form::text('category', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('flight.index') !!}" class="btn btn-default">Cancel</a>
</div>

<div id="crew-assignment-wrapper" class="form-group col-sm-12"></div>

<div id="example"></div>
<script src="{{asset('js/app.js')}}"></script>
