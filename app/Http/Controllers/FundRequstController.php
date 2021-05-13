<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\FundRequest;
use App\job_master;
use App\ledger;
use App\fund_request_amount;
use Illuminate\Support\Facades\DB;

class FundRequstController extends Controller
{
    

    public function index(){
         $fund= FundRequest::paginate(10);
         $job = job_master::all();
   //       $amount=fund_request_amount::groupBy('fund_code')
   // ->selectRaw('sum(amount) as sum')
   // ->get();
                     //dd($amount);

    	return view('fundrequest.Fund-Request-list',compact('fund','job'));
    }
    public function create(){

    	return view('fundrequest.index');
    }

    public function store(Request  $request){
    	 $data= $request->validate([
    		'request_code'=>'required|min:2|max:30',
    		'job_id'=>'required',
    		'request_by'=>'nullable',
    		'request_on'=>'required|date',
    		'note'=>'nullable',
    		'month_year'=>'required',
    		// 'year'=>'nullable',
    		'status'=>'required',
    		'amount'=>'required|numeric',
    		'file'=>'nullable',


    ]);
// dd($data);
     	  FundRequest::create($data);
        return redirect()->back();
    }

    public function requestadd(Request $request){

        //dd($request->job_id);
         $user = Auth::user()->name;
         $job_id = $request->job_id;
         $unique = "FR-".$job_id."-".uniqid();
         $data = $request->validate([   
          'job_id'=>'required',      
          'month_year'=>'required',      
          ]);
         $data['request_code'] = $unique;
         $data['request_by'] = $user;
         $data['request_on'] = date("Y-m-d");
         FundRequest::create($data);
         return redirect()->route('fund-request-edit',['id'=>$unique,'job_id'=>$job_id]);
    }

    public function fund_edit($id,$job_id){
          $fund = FundRequest::where('request_code',$id)->first();
          $ledger = ledger::all();
          $fund_req =DB::table('fund_reqest_amount')->select('*')->where('fund_code',$id)->get();
          $sum[]=0;
          foreach ($fund_req as $add){

               $sum[]= $add->amount;
          }
         $tamt = array_sum($sum);
          
          $job = DB::table('job_master')->select('*')->where('id',$job_id)->first();
          // dd($job);
        return view('fundrequest.Fund-Request-edit',compact('fund','job','ledger','fund_req','tamt'));
    }

    public function fund_update(Request $request ,$id){
        //dd($request->note);
       $data['note']= $request->note;
       $data['fund_reqest_amount']= $request->amount;
       //$data['request_code']= $request->request_code;
        FundRequest::where('id',$id)->update($data);
        return redirect('fund-request-list')->with('message','Request Is Successfully Updated');   
       //dd($data);
    }

    public function requestapproval($id){
          $data['status']= "send-request";
         $approval = FundRequest::where('request_code',$id)->update($data);
         return redirect()->back();

    }

    public function fundlistdraft(){
       
      $fund = FundRequest::where('status','send-request')->orWhere('status','Approved')->paginate(10);
      return view('fundrequest.fund-list-draft',compact('fund'));
    }

    public function fundamountdetails($id){
      
      $details  = fund_request_amount::where('fund_code',$id)->paginate(10);
      $request_by  = FundRequest::where('request_code',$id)->first();
      return view('fundrequest.fund-amount-details',compact('details','request_by'));
    }

    public function fundapprovesadmin($id){

      $data['status']= "Approved";
         $approval = FundRequest::where('request_code',$id)->update($data);
         return redirect()->back();
    }
}
