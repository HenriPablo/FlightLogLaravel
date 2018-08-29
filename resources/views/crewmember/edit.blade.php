@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Crewmember
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($crewmember, ['route' => ['crewmember.update', $crewmember->id], 'method' => 'patch']) !!}

                        @include('crewmember.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
