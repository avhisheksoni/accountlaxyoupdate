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
}
