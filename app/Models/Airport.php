<?php
/**
 * Created by IntelliJ IDEA.
 * User: tomekpilot
 * Date: 9/6/18
 * Time: 8:50 PM
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Airport extends Model
{

    /**
     * Airport table columns:
        id
        ico_identifier
        name
     */
    public $table = 'airport';
    public $timestamps = false;
    public $fillable = [
        'ico_identifier'
    ];
    public static $rules = [];
}
