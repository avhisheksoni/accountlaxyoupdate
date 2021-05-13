<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ledger extends Model
{
   protected $table= 'acco_ladger';
    protected $guarded = [];
    public $timestamps = true;


    // function ledgername()
    // {

    // 	return $this->hasmany('App\fund_request_amount','ledger_id','id');
    // }

    // function ledgernameforexpense()
    // {

    // 	return $this->hasmany('App\Expense','ledger_id','id');
    // }
}
