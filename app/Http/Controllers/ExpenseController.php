<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Expense;
use App\job_master;
use App\ledger;
use App\vendor;

class ExpenseController extends Controller
{
    


    public function index(){

         $job=job_master::all();
         $ledger=ledger::all();
         $vendor=vendor::all();
         $expense = Expense::paginate(10);

    	return view('expense.expense-list',compact('vendor','ledger','job','expense'));
    }

    public function store(Request $request){
    	$data = $request->validate([   
          'expense_data'=>'required',      
          'reference'=>'required',      
          'vendor_id'=>'required',      
          'ladger_id'=>'required',      
          'job_id'=>'required',      
          'amount'=>'required',       
          'sac_hsn_code'=>'required',       
          'amount'=>'required',       
          'note'=>'nullable',       
          ]);
        Expense::create($data);
        return redirect()->back();

    	
    }

    public function edit($id){

    	$expense = Expense::find($id);
    	$vendor = vendor::all();
    	$ledger = ledger::all();
    	$job = job_master::all();
    	 return view('expense.expense-edit',compact('expense','vendor','job','ledger'));

    }

    public function update(Request $request,$id){
        
        //dd($request->sac_hsn_code);
        $data = $request->validate([   
          'expense_data'=>'required',      
          'reference'=>'required',      
          'vendor_id'=>'required',      
          'ladger_id'=>'required',      
          'job_id'=>'required',      
          'amount'=>'required',       
          'sac_hsn_code'=>'required',        
          'note'=>'nullable',       
          ]);
          
          Expense::where('id',$id)->update($data);
          return redirect('expense-list');

    }

    public function delete($id){

    	$dservice = Expense::where('id', $id)->delete();
      return redirect()->back()->with('message','Expense Details  Is Successfully Removed From List');
    }
}
