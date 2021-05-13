<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\fund_request_amount;
use App\FundRequest;

class FundRequestAmountController extends Controller
{
    
    public function store(Request  $request,$id){
        
        $tamt = FundRequest::where('request_code',$id)->select('amount')->first();
        $newtamt =  $request->amount;
        $data['amount'] = $newtamt+$tamt->amount;
         FundRequest::where('request_code',$id)->update($data);
        $data = $request->validate([   
          'ledger_id'=>'required',      
          'fund_code'=>'required',      
          'amount'=>'required',      
          'note'=>'required',       
          ]);
        fund_request_amount::create($data);
        return redirect()->back();


    }
}
