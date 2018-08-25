<?php
/**
 * Created by IntelliJ IDEA.
 * User: tomekpilot
 * Date: 8/22/18
 * Time: 10:07 PM
 */

namespace App\Models;
use Eloquent as Model;

class AircraftClass extends Model
{
    public $table = 'aircraft_class';
    public $timestamps = false;

    public $fillable = [ 'class' ];

    protected  $casts = [
      'class' => 'string'
    ];

    public static  $rules =[];

}
