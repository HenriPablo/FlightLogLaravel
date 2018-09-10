INSERT INTO flight
    (
        date,
        aircraft_id,
        departure, -- get from airport
        destination, -- get from airport
        route,
        remarks,
        extended_flight_details_id, -- optional
        no_inst_aproaches,
        no_day_landings,
        no_night_landings,
        as_flight_instructor,
        cross_country,

        daytime, -- time of daytime conditions
        nighttime, -- time of nighttime conditions
        actual_instrument,
        simulated_instrument,
        ground_trainer,
        dual_received,
        pilot_in_command,
        second_in_command,
        total_duration_of_flight




    )
values
    (
        '2002-08-11',
        76, -- aircraft id
        64,
        64,
        'kspg-kspg',
        'some test remarks',
        null,
        0,
        1,
        0,
        0,
        0,
        0.3,
        0,
        0,
        0,
        0,
        0.3,
        0,
        0,
        0.3
    );

