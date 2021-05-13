<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\job_master;
use App\ExpenseReport;

class ExpenseReportController extends Controller
{
    
    public  function index(){
         
         $job = job_master::all();
         $exreport = ExpenseReport::paginate(10);
    	return View('ExpenseReport.expense-report-list',compact('job','exreport'));
    }

    public function store(Request $request){
        $user = Auth::user()->name;
    	$data = $request->validate([   
          'job_id'=>'required',      
          'reportdate'=>'required',        
          'title'=>'required',          
          ]);
    	$data['created_by'] = $user;
        ExpenseReport::create($data);
        return redirect()->back();
    }

    public function edit($id){

          $ex_report = ExpenseReport::find($id);
          $job = job_master::all();

           return view('ExpenseReport.expense-report-edit',compact('ex_report','job'));
    }

    public function update(Request $request,$id){

    //dd($request->created_by);

    	$data = $request->validate([   
          'job_id'=>'required',      
          'reportdate'=>'required',        
          'title'=>'required',          
          'created_by'=>'required',          
          'amount'=>'required',          
          'status'=>'required',        
          'note'=>'nullable',        
          'cash_on_hand'=>'nullable',        
          'expense_report_total'=>'nullable',        
          ]);
    	 ExpenseReport::where('id',$id)->update($data);
        return redirect('expense-report-list')->with('message','Request Is Successfully Updated');

    }

    public function approval($id){

          $data['status'] = "Sent-for-Approval";



          ExpenseReport::where('id',$id)->update($data);
          return redirect('expense-report-list')->with('message','Request Is forwarded For Approval');

      }

    public function delete($id){
       
       $dservice = ExpenseReport::where('id', $id)->delete();
      return redirect()->back()->with('message','Expense Report  Is Successfully Removed From List');

    }  
}
