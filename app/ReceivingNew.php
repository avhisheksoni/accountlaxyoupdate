<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReceivingNew extends Model
{
    protected $table= 'acco_new_receiving';
    protected $guarded = [];

    public function site(){
    	return $this->belongsTo('App\JobMaster', 'site_id');
    }

    public function warehouse(){
    	return $this->belongsTo('App\PurchaseWarehouse', 'warehouse_id');
    }

    public function items(){
        return $this->hasMany('App\ReceivingNewItem', 'new_receiving_id');
    }

    public function receiving(){
        return $this->belongsTo('App\Receiving', 'receiving_id');
    }

}
