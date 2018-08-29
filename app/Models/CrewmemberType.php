<?php
/**
 * Created by IntelliJ IDEA.
 * User: tomekpilot
 * Date: 8/27/18
 * Time: 11:15 PM
 */

namespace App\Models;
use Eloquent as Model;

class CrewmemberType extends Model
{
    public $table = 'crewmembertype';
    public $timestamps = false;
    public $fillable = ['role'];
    protected $casts = [
        'role' =>'string'
    ];
    public static $rules = [];
}
