<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 

class PurchaseModel extends Model
{
     use SoftDeletes;
    protected $table= 'acco_purchase';
    protected $guarded = [];
    public $timestamps = true;

     public function job()
    {
        return $this->belongsTo('App\PJobMast','job_id');
    }

    public function checkamount(){

    	return $this->hasmany('App\Purchasechq','purchase_id');
    }
}
