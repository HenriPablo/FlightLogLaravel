@extends('layouts.app')

@section('content')
    <section>
        <h1>Edit Preferences</h1>
    </section>

    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::model( $preferences, ['route'=>['preferences.update', $preferences->id], 'method'=>'patch']) !!}
                    @include('preferences.fields')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
