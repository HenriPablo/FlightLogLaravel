<?php
/**
 * Created by IntelliJ IDEA.
 * User: tomekpilot
 * Date: 8/15/18
 * Time: 10:52 PM
 */

namespace App\Repositories;

use App\Models\Airport;
use InfyOm\Generator\Common\BaseRepository;

class AirportRepository extends BaseRepository
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
        // TODO: Implement model() method.
        return Airport::class;
    }
}
