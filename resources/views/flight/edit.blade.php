@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>Edit Flight</h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($flight, ['route' => ['flight.update', $flight->id], 'method' => 'patch']) !!}

                        @include('flight.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
