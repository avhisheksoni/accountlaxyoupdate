<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table= 'acco_city_mast';
    protected $guarded = [];
    public $timestamps = true;

    protected $primaryKey = 'city_code';
}
