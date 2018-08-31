<?php
/**
 * Created by IntelliJ IDEA.
 * User: tomekpilot
 * Date: 8/15/18
 * Time: 10:54 PM
 */

namespace App\Models;
use Eloquent as Model;

class Flight extends Model
{
    public $table = 'flight';
    public $timestamps = false;

    /**
     * list of columns from FLIGHT table
            id
            actual_instrument
            aircraft_id
            aircraft_category_and_class
            aircraft_tail_number
            aircraft_type
            as_flight_instructor
            cross_country
            date
            day
            departure
            destination
            dual_received
            extended_flight_details_id
            ground_trainer
            instructor_id
            night
            no_day_landings
            no_inst_aproaches
            no_night_landings
            pilot_in_command
            remarks
            route
            safety_pilot_id
            second_in_command
            simulated_instrument
            story_id
            total_duration_of_flight
    */

    public $fillable = [
        'from'
    ];

    protected $casts = [
        'from'=>'string'
    ];

    public static $rules = [

    ];


}
