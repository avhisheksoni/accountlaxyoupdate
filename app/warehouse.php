<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class warehouse extends Model
{
    protected $table= 'prch_warehouses';
    protected $guarded = [];
    public $timestamps = true;
}
