@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Aircraft Class
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($aircraft_class, ['route' => ['aircraft_class.update', $aircraft_class->id], 'method' => 'patch']) !!}

                        @include('aircraft_class.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
