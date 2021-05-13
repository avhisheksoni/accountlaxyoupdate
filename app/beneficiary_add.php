<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class beneficiary_add extends Model
{
	use SoftDeletes;
    protected $table= 'acco_beneficiary_add';
    protected $guarded = [];
    public $timestamps = true;

    public function company(){

    	return $this->belongsTo('App\Company_mast','comp_id');
    }

    public function beneficiary(){

    	return $this->belongsTo('App\Client','client_id');
    }
}
