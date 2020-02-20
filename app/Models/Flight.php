<?php
/**
 * Created by IntelliJ IDEA.
 * User: tomekpilot
 * Date: 8/15/18
 * Time: 10:54 PM
 */

namespace App\Models;
use Eloquent as Model;
use App\Models\CrewAssignment;

class Flight extends Model
{
    public $table = 'flight';
    public $timestamps = false;
    /**
     * list of columns from FLIGHT table
    id
    date
    aircraft_id
    departure
    route
    destination
    no_day_landings
    no_inst_aproaches
    no_night_landings
    aircraft_category_and_class
    aircraft_tail_number
    aircraft_type
    as_flight_instructor
    cross_country
    actual_instrument

    dual_received
    extended_flight_details_id
    ground_trainer
    instructor_id
    night

    pilot_in_command
    remarks

    safety_pilot_id
    second_in_command
    simulated_instrument
    story_id
    total_duration_of_flight
     */

    public $fillable = [
        'departure',
        'destination',
        'aircraft_id'
    ];
    protected $casts = [
//        'departure'=>'string'
    'aircraft_id'=>'int'
    ];

    public static $rules = [];


//    public function crewAssignments(){
//        return $this->belongsToMany('App\Models\CrewAssignment', 'crew_assignment')
//            ->withPivot( 'id', 'flight_id', 'crewmember_id', 'crewmembertype_id' ); /*, 'crewmember_id', 'crewmembertype_id'*/
//    }
}
