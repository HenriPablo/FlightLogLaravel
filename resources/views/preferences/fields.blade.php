
<div class="form-group col-sm-6">
    {!! Form::label('id', 'ID') !!}
    {!! Form::text('id', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group col-sm-12">
    {!! Form::label('alwaysRenderSelf', 'Always Render Self:') !!}
    {{--
        Use the hidden field to pass value of 'alwaysRenderSelf'
        because trying to pass '0' by unchecking the box will keep the box from getting sent.
    --}}
    <input type="hidden" name="alwaysRenderSelf" id="alwaysRenderSelf" value="{{ $preferences->alwaysRenderSelf }}" />
    <input name="checkAlwaysRenderSelf"
           id="checkAlwaysRenderSelf"
           type="checkbox"
           value="{{ $preferences->alwaysRenderSelf }}" {{ $preferences->alwaysRenderSelf == 1 ? 'checked':'' }} />

</div>

<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class'=> 'btn btn-primary']) !!}
</div>

<script>
    $(document).ready( function () {
        $("#checkAlwaysRenderSelf").on('click', function () {
            if( $(this).val() == "1" )
            {
                $(this).val("0");
                $("#alwaysRenderSelf").val("0");
                $(this).prop('checked', false);

            }
            else if( $(this).val() == "0" )
                {
                    $(this).val("1");
                    $("#alwaysRenderSelf").val("1");
                    $(this).prop('checked', true);
                }
        })

    })
</script>
