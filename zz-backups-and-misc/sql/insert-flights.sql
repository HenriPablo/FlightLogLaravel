INSERT INTO flight
    (
        actual_instrument,
        aircraft_id,
        aircraft_category_and_class, -- delete
        aircraft_tail_number,
        aircraft_type, -- delete - get from aircraft
        as_flight_instructor,
        cross_country,
        date,
        day, -- delete, can't remember why it's here
        departure, -- get from airport
        destination, -- get from airport
        dual_received,
        extended_flight_details_id, -- optional
        ground_trainer,
        instructor_id, -- GET FROM CREW ASSIGNMENT
        night,
        no_day_landings,
        no_inst_aproaches,
        no_night_landings,
        pilot_in_command,
        remarks,
        route,
        safety_pilot_id, -- GET FROM CREW ASSIGNMENT
        second_in_command,
        simulated_instrument,
        story_id, -- optional
        total_duration_of_flight
    )
values
    (0.3, 51, 'n103df', 0, 0, '2002-08-11', 'kspg', 'kspg', 0.3, null, 0, XXX,  0, 1, 0, 0, 'remarks, preflight, taxi, came back early' 'kspg-kspg', null, 0, 0, null, 0.3 ),
    (),
    ();
