<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 

class salechq extends Model
{   
	use SoftDeletes;
    protected $table= 'acco_saleschq';
    protected $guarded = [];
    public $timestamps = true;


   
}
