<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laratrust\LaratrustRole;

class role_user extends Model
{
    protected $table= 'role_user';
    protected $guarded = [];
    public $timestamps = true;
    protected $primaryKey = 'role_id';



    
}
