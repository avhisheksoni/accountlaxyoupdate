<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 

class sales extends Model
{
 
	 use SoftDeletes;
    protected $table= 'acco_sales';
    protected $guarded = [];
    public $timestamps = true;

    public function job()
    {
        return $this->belongsTo('App\job_master','job_id');
    }

    public function checkamount(){

    	return $this->hasMany('App\salechq','sale_id');
    }
}

