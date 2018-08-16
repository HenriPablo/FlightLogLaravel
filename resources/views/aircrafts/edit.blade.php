@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Aircraft
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($aircraft, ['route' => ['aircrafts.update', $aircraft->id], 'method' => 'patch']) !!}

                        @include('aircrafts.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection