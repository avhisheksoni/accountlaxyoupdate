<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gstin extends Model
{
    protected $table= 'acco_gstin';
    protected $guarded = [];
    public $timestamps = true;
}
