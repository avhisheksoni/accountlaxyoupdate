<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FundRequest extends Model
{
    protected $table= 'acco_fund_request';
    protected $guarded = [];
    public $timestamps = true;
}
