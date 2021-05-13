<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laratrust\LaratrustRole;

class permission_user extends Model
{
    protected $table= 'permission_user';
    protected $guarded = [];
    public $timestamps = true;
    protected $primaryKey = 'permission_id';
}
