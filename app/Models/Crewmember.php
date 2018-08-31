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


    /** @var array deal with ONE to MANY CrewmemberTypes
     *  https://laravel.com/docs/5.6/eloquent-relationships#one-to-many
     */

    /**  list of columns from crewmember table
            id
            address1
            address2
            phone
            certificate_no
            city
            email
            first_name
            last_name
            notes
            state
            zip
            class
            display_email
            enabled
            password
            username
     */

    public $fillable = ['first_name'];

    protected $casts = [
        'first_name' =>'string'
    ];
    public static $rules = [];
}
