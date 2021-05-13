<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExpenseReport extends Model
{
    protected $table= 'acco_expense_report';
    protected $guarded = [];
    public $timestamps = true;
}
