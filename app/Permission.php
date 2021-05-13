<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laratrust\Models\LaratrustPermission;

class Permission extends Model
{
     protected $table= 'permissions';
    protected $guarded = [];
    public $timestamps = true;
}
