<?php
/**
 * Created by IntelliJ IDEA.
 * User: tbrymora
 * Date: 8/23/2018
 * Time: 11:08 AM
 */

namespace App\Repositories;

use App\Models\AircraftClass;
use InfyOm\Generator\Common\BaseRepository;

class AircraftClassRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'class'
    ];

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        // TODO: Implement model() method.
        return AircraftClass::class;
    }
}
