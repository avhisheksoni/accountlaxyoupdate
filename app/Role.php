<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;
use Laratrust\LaratrustRole;
 


class Role extends Model
{

	 //use SoftDeletes;
    protected $table= 'roles';
    protected $guarded = [];
    public $timestamps = true;
   
}
