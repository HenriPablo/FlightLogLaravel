<?php
/**
 * Created by IntelliJ IDEA.
 * User: tomekpilot
 * Date: 8/15/18
 * Time: 10:52 PM
 */

namespace App\Repositories;

use App\Models\Flight;
use InfyOm\Generator\Common\BaseRepository;

class FlightRepository extends BaseRepository
{

    protected $fieldsSearchable = [
        'category'
    ];

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Flight::class;
    }
}
