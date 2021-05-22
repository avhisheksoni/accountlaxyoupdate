<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReceivingItem extends Model
{
    protected $table	= 'acco_receiving_item';
    protected $guarded	= [];
    public $timestamps	= true;

    public function purchaseItem(){
    	return $this->belongsTo('App\PurchaseItem', 'item_id');
    }
    
}
