<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vendor_mast extends Model
{
     protected $table= 'acco_vendor_mast';
    protected $guarded = [];
    public $timestamps = true;

    // function vendorname()
    // {

    // 	return $this->hasmany('App\Expense','vendor_id','id');
    // }


    
     function vendor(){

    	return $this->belongsTo('App\vendor_type','vendor_type');
    }

    function firm(){

    	return $this->belongsTo('App\firm_type','firm_type');
    }

    function state(){

        return $this->belongsTo('App\state','state_code');
    }

    function cities(){

        return $this->belongsTo('App\City','city_code');
    }
}
