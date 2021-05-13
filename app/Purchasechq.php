<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 

class Purchasechq extends Model
{
	use SoftDeletes;
    protected $table= 'acco_purchasechq';
    protected $guarded = [];
    public $timestamps = true;
}
