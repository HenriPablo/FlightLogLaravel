<?php
/**
 * Created by IntelliJ IDEA.
 * User: tomekpilot
 * Date: 9/11/18
 * Time: 9:19 PM
 */

namespace App\Models;
use Eloquent as Model;


class CrewAssignment extends Model
{

    public $table = 'crew_assignment';
    public $timestamps = false;

    public static $rules = [];

}
