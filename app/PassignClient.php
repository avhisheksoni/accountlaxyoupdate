<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PassignClient extends Model
{   
	use softdeletes;
    protected $table= 'acco_p_assign_client';
    protected $guarded = [];
    public $timestamps = true;

    public function company(){

    	return $this->belongsTo('App\Company_mast','comp_id');
    } 

    public function petty(){

    	return $this->belongsTo('App\vendor_mast','client_id');
    } 

    //  public function petty(){

    //     return $this->belongsTo('App\vendor_mast','client_id');
    // } 
}
