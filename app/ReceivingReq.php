<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReceivingReq extends Model
{
    protected $table	= 'acco_receiving_request';
    protected $guarded	= [];
    public $timestamps	= true;

    public function site(){
    	return $this->belongsTo('App\job_master', 'site_id');
    }

    public function warehouse(){
    	return $this->belongsTo('App\PurchaseWarehouse', 'warehouse_id');
    }

    public function requestItems(){
    	return $this->hasMany('App\ReceivingReqItem', 'receiving_request_id');
    }

    public function receiving(){
        return $this->belongsTo('App\Receiving', 'return_receiving_id');
    }
    
}
