<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Receiving extends Model
{
   use SoftDeletes;
    protected $table= 'ap_receving';
    protected $guarded = [];
    public $timestamps = true;

    
}
