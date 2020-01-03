<?php

namespace App\Models;
use Eloquent as Model;

class Preferences extends Model
{

    public $table = 'preferences';
    public $timestamps = false;

    public $fillable = ['alwaysRenderSelf'];

    protected $casts = ['alwaysRenderSelf'=>'integer'];

    public static $rules = [];

}
