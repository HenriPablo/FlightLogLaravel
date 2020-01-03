<?php

namespace App\Repositories;

use App\Models\Preferences;
use InfyOm\Generator\Common\BaseRepository;

class PreferencesRepository extends BaseRepository
{

    //protected $fieldsSearchable = ['alwaysRenderSelf'];

    /**
     * @inheritDoc
     */
    public function model()
    {
        return Preferences::class;
    }
}
