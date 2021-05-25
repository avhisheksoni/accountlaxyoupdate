<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SiteManager extends Model
{
	protected $table= 'acco_users';
    protected $guarded = [];
    public $timestamps = true;

    public function site(){
    	return $this->belongsTo('App\JobMaster', 'site_id');
    }

    public function receivingReq(){
    	return $this->hasMany('App\ReceivingReq', 'site_id', 'site_id');
    }

    public function receiving(){
    	return $this->hasMany('App\Receiving', 'site_id', 'site_id');
    }
}
