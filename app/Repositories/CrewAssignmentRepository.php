<?php
/**
 * Created by IntelliJ IDEA.
 * User: tomekpilot
 * Date: 8/15/18
 * Time: 10:52 PM
 */

namespace App\Repositories;

use App\Models\CrewAssignment;
use InfyOm\Generator\Common\BaseRepository;

class CrewAssignmentRepository extends BaseRepository
{

    protected $fieldsSearchable = [
        'flight_id'
    ];

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        // TODO: Implement model() method.
        return CrewAssignment::class;
    }
}
