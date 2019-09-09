<?php

namespace App\Repositories;

use App\Models\aircraft;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class aircraftRepository
 * @package App\Repositories
 * @version August 13, 2018, 12:38 am UTC
 *
 * @method aircraft findWithoutFail($id, $columns = ['*'])
 * @method aircraft find($id, $columns = ['*'])
 * @method aircraft first($columns = ['*'])
*/
class aircraftRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'aircraft_category',
        'aircraft_class',
        'aircraft_tail_number',
        'aircraft_type',
        'complex',
        'hi_performance',
        'nickname'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return aircraft::class;
    }
}
