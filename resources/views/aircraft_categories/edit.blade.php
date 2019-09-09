@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Aircraft Category
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($aircraft_category, ['route' => ['aircraft_category.update', $aircraft_category->id], 'method' => 'patch']) !!}

                        @include('aircraft_categories.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
