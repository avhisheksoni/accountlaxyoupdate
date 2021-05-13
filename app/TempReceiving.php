<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TempReceiving extends Model
{
    protected $table= 'temp_receiving';
    protected $guarded = [];

    public function item_name(){
    	return $this->belongsTo('App\PurchaseItem', 'item_number', 'item_number');
    }
    public function warehouse(){
    	return $this->belongsTo('App\PurchaseWarehouse', 'warehouse_id', 'id');
    }
    public function site(){
    	return $this->belongsTo('App\JobMaster', 'site_id', 'id');
    }
}
