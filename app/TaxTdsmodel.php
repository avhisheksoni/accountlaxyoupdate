<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaxTdsmodel extends Model
{
    protected $table= 'acco_re_tds_tax';
    protected $guarded = [];
    public $timestamps = true;
}
