<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guarantee extends Model
{
    protected $table= 'acco_guarantee_request';
    protected $guarded = [];
    public $timestamps = true;


    public function job()
	    {
	        return $this->belongsTo('App\job_master','job_code');
	    }

   public function beneficary()
	    {
	        return $this->belongsTo('App\beneficiary_add','beneficiary_id');
	    }    

    public function bgmast()
	    {
	        return $this->belongsTo('App\bg_type_mast','bg_type');
	    }   

	public function bank()
	    {
	        return $this->belongsTo('App\Bank','bank_code');
	    }   
    public function bgstatus()
	    {
	        return $this->belongsTo('App\bg_set_status','status');
	    } 

	public function clientname(){

		return $this->belongsTo('App\Client','beneficiary_id');
	}  

	public function company(){

        return $this->belongsTo('App\Company_mast','comp_id');
    }         
}
