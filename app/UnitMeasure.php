<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UnitMeasure extends Model
{
   use SoftDeletes;
    protected $table	= 'prch_unitofmeasurements';
    protected $guarded 	= [];
    public $timestamps 	= true;

    
}
