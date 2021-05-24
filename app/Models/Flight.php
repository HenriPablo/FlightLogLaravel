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
        'date',
        'aircraft_id',
        'departure',
        'route',
        'destination',
        'remarks',
        'no_inst_approaches',
        'no_day_landings',
        'no_night_landings',
        'as_flight_instructor',
        'cross_country',
        'daytime',
        'nighttime',
        'actual_instrument',
        'simulated_instrument',
        'ground_trainer',
        'dual_received',
        'pilot_in_command',
        'second_in_command',
        'total_duration_of_flight'
        // Implement the full works for table 'flight_extended_details'
        // and do it as dynamic fileds - mostly
        // so that trackable attributes can be added as needed
        // and can be customized to suite the specific flying bun is doing
//        'extended_flight_details'

    ];
    public $table = 'flight';

    public $timestamps = false;
    protected $casts = [
    'departure'=>'string',
    'aircraft_id'=>'int',
    'pilot_in_command' => 'double'
    ];

    public static $rules = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     **/
    public function aircraft()
    {
        return $this->belongsTo(\App\Models\Aircraft::class);
    }

    public function crewAssignments(){
        return $this->belongsToMany('App\Models\CrewAssignment', 'crew_assignment')
            ->withPivot( 'id', 'flight_id', 'crewmember_id', 'crewmembertype_id' ); /*, 'crewmember_id', 'crewmembertype_id'*/
    }
}
