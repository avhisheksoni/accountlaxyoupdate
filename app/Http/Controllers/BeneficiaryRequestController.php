<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Beneficiary;
use  App\job_master;
use  App\bg_request_type;
use  App\bg_type_mast;
use  App\BeneficiaryRequest;
use  App\Client;
use Illuminate\Support\Facades\Auth;

class BeneficiaryRequestController extends Controller
{
    
    public  function index(){
       
       $beneficiary =  BeneficiaryRequest::paginate(10);
    	return view('Beneficiary-req.beneficiaryrequestlist',compact('beneficiary'));
    }


    public function create(){
         
          
          $beneficiary =  Beneficiary::all();
          $bg_request_type =  bg_request_type::all();
          $bg_type =  bg_type_mast::all();
          $job =  job_master::all();
        
    	return view('Beneficiary-req.beneficiaryreques-add',compact('beneficiary','job','bg_request_type','bg_type'));
    }

    public function getjobid(Request $request){
        
         $benf_id = $request->id;
         $job= job_master::find($benf_id);
         return $job;

    }

    public function store(Request $request){
      // return $request->all();
         $data = $request->validate([   
          'beneficiary_id'=>'required',      
          'job_id'=>'required',        
          'request_type_id'=>'required',          
          'bg_type_id'=>'required',          
          'on_behalf_of'=>'required',          
          'amount'=>'required', 
          //'contract'=>'required',          
          'note'=>'required',          
          'adoption_type'=>'required',          
          'bg_request_date'=>'required',          
          'submission_date'=>'required',          
          'user_id'=>'required',          
          ]);
         // return $data;
        $code = BeneficiaryRequest::max('id');
        $no = $code+1;
        $data['request_code'] = "BG-".$no;
        //dd($data);
        BeneficiaryRequest::create($data);
        return redirect('beneficiary-request-list');
    }

    public function edit($id){
        
        $edit = BeneficiaryRequest::find($id);
        $beneficiary = Beneficiary::all();
        $job = job_master::all();
        $bg_req_type = bg_request_type::all();
        $bg_type = bg_type_mast::all();
        return view('Beneficiary-req.beneficiary-request-edit',compact('edit','beneficiary','job','bg_req_type','bg_type'));
    }

    public function details($id){
        
        $edit = BeneficiaryRequest::find($id);
      return  view('Beneficiary-req.beneficiary-details',compact('edit','beneficiary','job','bg_req_type','bg_type'));
    }

    public function update(Request $request,$id){
         
         $data = $request->validate([   
          'beneficiary_id'=>'required',      
          'job_id'=>'required',        
          'request_type_id'=>'required',          
          'bg_type_id'=>'required',          
          'on_behalf_of'=>'required',          
          'amount'=>'required', 
          //'contract'=>'required',          
          'note'=>'required',          
          'adoption_type'=>'required',          
          'bg_request_date'=>'required',          
          'submission_date'=>'required',          
          // 'user_id'=>'required',          
          ]);
          
          BeneficiaryRequest::where('id',$id)->update($data);
          return redirect('beneficiary-request-list');


    }

    public function delete($id){

      $dservice = BeneficiaryRequest::where('id', $id)->delete();
      return redirect()->back()->with('message','Beneficiary Request  Is Successfully Removed From List');
    }

    public function guranteetypelist(){

         $guarantee = bg_type_mast::paginate(10);
         return view('Beneficiary-req.guarantee-type-mast',compact('guarantee'));
    }
    public function gauranteadd(){
      
      return view('Beneficiary-req.guarantee-type-add');
    }

    public function gauranteestore(Request $request){
         
          $data = $request->validate([   
          'name'=>'required',  
          'status_lc'=>'required',  
        ]);
        bg_type_mast::create($data);
        return redirect('Guarantee-type-list');


    }

    public function guaranteeedit($id){
      $edit= bg_type_mast::find($id);
      return view('Beneficiary-req.guarantee-type-edit',compact('edit'));
    }

    public function guaranteeupdate(Request $request,$id){

      $data = $request->validate([   
          'name'=>'required',  
          'status_lc'=>'required',  
        ]);
      //dd($data);
      bg_type_mast::where('id',$id)->update($data);
          return redirect('Guarantee-type-list');
    }

    public function gauranteedelete($id){

          bg_type_mast::where('id',$id)->delete();
          return redirect('Guarantee-type-list');
    }

    public function guaranteedetails($id){
        
         $edit= bg_type_mast::find($id);
      return view('Beneficiary-req.guarantee-type-details',compact('edit'));

    }

    public function getjobsale(Request $request){
      
        return job_master::where('client_id',$request->id)->get();
    }

    public function beneficiarystatus(Request $request, $id){
         $data['status'] = 'Approved1';
         $data['manager_level'] = 1;
       BeneficiaryRequest::where('id',$request->id)->update($data);
       return redirect('beneficiary-request-list');
    }

    public function beneficiaryadmin(Request $request, $id){
         $data['status'] = 'Approved2';
         $data['level2'] = 1;
       BeneficiaryRequest::where('id',$request->id)->update($data);
       return redirect('beneficiary-request-list');
    }

     public function beneficiarysadmin(Request $request, $id){
         $data['status'] = 'Approved3';
         $data['level1'] = 1;
       BeneficiaryRequest::where('id',$request->id)->update($data);
       return redirect('beneficiary-request-list');
    }

}
