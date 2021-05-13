<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class state extends Model
{
    protected $table= 'acco_state_mast';
    protected $guarded = [];
    public $timestamps = true;
    protected $primaryKey = 'state_code';
}
