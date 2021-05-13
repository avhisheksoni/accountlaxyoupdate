<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssignClient extends Model
{
    protected $table= 'acco_assign_client';
    protected $guarded = [];
    public $timestamps = true;

    function client(){

    	return $this->belongsTo('App\Client','client_id');
    }

    function company(){

    	return $this->belongsTo('App\Company_mast','comp_id');
    }
}
