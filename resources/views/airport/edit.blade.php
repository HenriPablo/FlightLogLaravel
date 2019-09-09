@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Airport
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($airport, ['route' => ['airport.update', $airport->id], 'method' => 'patch']) !!}

                        @include('airport.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
