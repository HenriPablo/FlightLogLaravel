@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Flight
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="container">

                    @include('flight.show_fields')

                    <div class="row">
                        <a href="{!! route('flight.index') !!}" class="btn btn-dark btn-default">Back</a>
                    </div>
                </div>



            </div>
        </div>
    </div>

    <?php
        dump( $crew_assignment[0] );
        //var_dump( $flight->crewAssignments->toArray() );
    ?>
    {{--{{ $crew_assignment->$crewmember_id }}--}}

@endsection
