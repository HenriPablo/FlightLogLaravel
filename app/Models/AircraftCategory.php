<?php
/**
 * Created by IntelliJ IDEA.
 * User: tomekpilot
 * Date: 8/15/18
 * Time: 10:54 PM
 */

namespace App\Models;
use Eloquent as Model;

class AircraftCategory extends Model
{
    public $table = 'aircraft_category';
    public $timestamps = false;

    public $fillable = [
        'category'
    ];

    protected $casts = [
        'category'=>'string'
    ];

    public static $rules = [

    ];


}
