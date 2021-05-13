<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Beneficiary extends Model
{
    protected $table= 'acco_beneficiary';
    protected $guarded = [];
    public $timestamps = true;
}
