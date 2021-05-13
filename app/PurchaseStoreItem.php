<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PurchaseStoreItem extends Model
{
   use SoftDeletes;
    protected $table= 'prch_store_item';
    protected $guarded = [];
    //public $timestamps = true;

    public function prch_item(){
    	return $this->belongsTo('App\PurchaseItem', 'item_number', 'item_number');
    }
}
