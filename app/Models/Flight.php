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

    public $fillable = [
        'from'
    ];

    protected $casts = [
        'from'=>'string'
    ];

    public static $rules = [

    ];


}
