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
                <div class="row" style="padding-left: 20px">
                    @include('flight.show_fields')
                    <a href="{!! route('flight.index') !!}"
                       class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>

    <?php
        var_dump( $flight->crew_assignment->toArray() );
        //var_dump( $flight->crewAssignments->toArray() );
    ?>
@endsection
