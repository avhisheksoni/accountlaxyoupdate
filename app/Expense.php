<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $table= 'acco_expenses';
    protected $guarded = [];
    public $timestamps = true;
}
