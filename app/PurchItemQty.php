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

    public function itemname(){

    	return $this->belongsTo('App\PurchaseItem','item_number','item_id');
    }
}
