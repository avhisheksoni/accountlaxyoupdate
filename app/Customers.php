<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 


class Customers extends Model
{
	use SoftDeletes;
    protected $table= 'acco_customer';
    protected $guarded = [];
    public $timestamps = true;
}
