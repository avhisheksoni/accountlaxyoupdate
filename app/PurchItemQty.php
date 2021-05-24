<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PurchItemQty extends Model
{
   use SoftDeletes;
    protected $table= 'acco_item_quantity';
    protected $guarded = [];
    public $timestamps = true;

     public function itemdetails(){
   	return $this->belongsTo('App\PurchaseItem', 'item_id');
   }

   public function warehouse(){
   	return $this->belongsTo('App\warehouse', 'wareh_id');
   }
}
