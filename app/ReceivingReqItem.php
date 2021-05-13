<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReceivingReqItem extends Model
{
    protected $table= 'acco_receiving_request_items';
    protected $guarded = [];
    public $timestamps = true;

    public function purchaseItem(){
    	return $this->belongsTo('App\PurchaseItem', 'item_number', 'item_number');
    }
	/*public function unit(){
    	return $this->belongsTo('App\UnitMeasure', 'item_number', 'item_number');
    }*/
    
}
