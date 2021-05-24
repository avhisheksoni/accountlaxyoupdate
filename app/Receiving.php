<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Receiving extends Model
{
   use SoftDeletes;
    protected $table    = 'acco_receivings';
    protected $guarded  = [];
    public $timestamps  = true;

    public function site(){
    	return $this->belongsTo('App\JobMaster', 'site_id');
    }

    public function warehouse(){
    	return $this->belongsTo('App\PurchaseWarehouse', 'warehouse_id');
    }

    public function requestItems(){
    	return $this->hasMany('App\ReceivingItem', 'receiving_id');
    }
    
}
