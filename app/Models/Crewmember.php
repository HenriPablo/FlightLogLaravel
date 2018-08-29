<?php
/**
 * Created by IntelliJ IDEA.
 * User: tomekpilot
 * Date: 8/27/18
 * Time: 11:15 PM
 */

namespace App\Models;
use Eloquent as Model;

class Crewmember extends Model
{
    public $table = 'crewmember';
    public $timestamps = false;

    public $fillable = ['first_name'];

    protected $casts = [
        'first_name' =>'string'
    ];
    public static $rules = [];
}
