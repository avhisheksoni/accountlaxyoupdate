<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PJobMast extends Model
{
    use SoftDeletes;
    protected $table= 'acco_p_job_mast';
    protected $guarded = [];
    public $timestamps = true;

    function Pgst(){

    	return $this->belongsTo('App\tax_gst','tax_gst');
    }

    function Ptds(){

    	return $this->belongsTo('App\TaxTdsmodel','tax_tds');
    }

    function Pgstin(){

    	return $this->belongsTo('App\Gstin','e_commerece_gstin');
    }

    function Pcompany(){

        return $this->belongsTo('App\Company_mast','comp_id');
    }

    function Pclient(){

        return $this->belongsTo('App\vendor_mast','client_id');
    }

    function category(){

        return $this->belongsTo('App\job_categorgy','cat_id');
    }

}
