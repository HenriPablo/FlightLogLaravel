<?php
/**
 * Created by IntelliJ IDEA.
 * User: tomekpilot
 * Date: 8/15/18
 * Time: 10:52 PM
 */

namespace App\Repositories;

use App\Models\Crewmember;
use InfyOm\Generator\Common\BaseRepository;

class CrewmemberRepository extends BaseRepository
{

    protected $fieldsSearchable = [
        'crewmember'
    ];

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Crewmember::class;
    }
}
