<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BeneficiaryRequest extends Model
{
    protected $table= 'acco_beneficiary_request';
    protected $guarded = [];
    public $timestamps = true;

   public function benef(){

    	return $this->belongsTo('App\Client','beneficiary_id');
    }

    public function bgtype(){

    	return $this->belongsTo('App\bg_request_type','request_type_id');
    }

    public function bg_type_mast(){

        return $this->belongsTo('App\bg_type_mast','bg_type_id');
    }

    public function workname(){

    	return $this->belongsTo('App\job_master','job_id');
    }

    public function username(){

    	return $this->belongsTo('App\User','user_id');
    }

    public function client(){

        return $this->belongsTo('App\Client','beneficiary_id');
    }

}
