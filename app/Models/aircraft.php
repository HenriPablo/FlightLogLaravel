<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class aircraft
 * @package App\Models
 * @version August 13, 2018, 12:38 am UTC
 *
 * @property \App\Models\AircraftCategory aircraftCategory
 * @property \App\Models\AircraftClass aircraftClass
 * @property \Illuminate\Database\Eloquent\Collection pilotPilotRoleXref
 * @property \Illuminate\Database\Eloquent\Collection flightPilotXref
 * @property \Illuminate\Database\Eloquent\Collection Flight
 * @property bigInteger aircraft_id
 * @property bigInteger aircraft_category
 * @property bigInteger aircraft_class
 * @property string aircraft_tail_number
 * @property string aircraft_type
 * @property boolean complex
 * @property boolean hi_performance
 * @property string nickname
 */
class aircraft extends Model
{
    //use SoftDeletes;

    public $table = 'aircraft';
    public $timestamps = false;

    //const CREATED_AT = 'created_at';
    //const UPDATED_AT = 'updated_at';


    //protected $dates = ['deleted_at'];


    public $fillable = [
        'aircraft_id',
        'aircraft_category',
        'aircraft_class',
        'aircraft_tail_number',
        'aircraft_type',
        'complex',
        'hi_performance',
        'nickname'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'aircraft_id' => 'int',
        'aircraft_tail_number' => 'string',
        'aircraft_type' => 'string',
        'complex' => 'boolean',
        'hi_performance' => 'boolean',
        'nickname' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function aircraftCategory()
    {
        return $this->belongsTo(\App\Models\AircraftCategory::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function aircraftClass()
    {
        return $this->belongsTo(\App\Models\AircraftClass::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function flights()
    {
        return $this->hasMany(\App\Models\Flight::class);
    }
}
