@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Crewmember Type
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($crewmemberType, ['route' => ['crewmember_type.update', $crewmemberType->id], 'method' => 'patch']) !!}

                        @include('crewmember_type.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
