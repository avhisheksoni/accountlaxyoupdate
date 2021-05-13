<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PurchaseItem extends Model
{
   use SoftDeletes;
    protected $table	= 'prch_items';
    protected $guarded 	= [];
    public $timestamps 	= true;

    public function purchaseStoreQty(){
    	return $this->hasMany('App\PurchaseStoreItem', 'item_number', 'item_number');
    }

    public function unit(){
    	return $this->belongsTo('App\UnitMeasure', 'unit_id', 'id');
    }
}
