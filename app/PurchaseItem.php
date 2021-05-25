<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PurchaseItem extends Model
{

    protected $table	= 'prch_items';
    protected $guarded 	= [];
    public $timestamps 	= true;

    public function purchaseStoreQty(){
    	return $this->hasMany('App\PurchaseStoreItem', 'item_number', 'item_number');
    }

    public function unit(){
    	return $this->belongsTo('App\UnitMeasure', 'unit_id', 'id');
    }

    public function siteItemsQty(){
        return $this->hasMany('App\PurchItemQty','item_id');
    }

    public function siteItemQty(){
        return $this->hasOne('App\PurchItemQty','item_id');
    }
}
