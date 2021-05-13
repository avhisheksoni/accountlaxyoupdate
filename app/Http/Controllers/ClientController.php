<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\job_master;
use App\AssignClient;
use App\sales;
use App\City;
use App\state;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;
use App\Exports\ClientExport;
use App\Exports\CompExport;
use App\beneficiary_add;
use App\BeneficiaryRequest;
use Illuminate\Support\Facades\DB;
use Response;

class ClientController extends Controller
{

 public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function index(){
         
      $cli = Client::all();
    	return view('Client.index',compact('cli'));
    }

     public function create(){
         
       
    	return view('Client.create');
    }

    public function store(Request $request){
       // dd($request->all());
        $last_id  = DB::table('acco_re_client')->max('id');
        $add= $last_id+1;
    //     $data= $request->validate([
    //     'name'=>'required|min:2|max:30',
    //     'gstin'=>'required|max:15|min:15|unique:acco_re_client',
    //     'pan_no'=>'required|max:10|min:10',
    //     'email'=>'required|',
    //     'state_code'=>'required|',
    //     'city_code'=>'required|',
    //     'correspondence_address'=>'nullable',
    //     'Registered_address'=>'required',
    //     'note'=>'nullable',
    //     'tech_head_ctect'=>'nullable|max:10|min:10',
    //     'billing_person_ctect'=>'nullable|max:10|min:10',
    //     'account_person_ctect'=>'nullable|max:10|min:10',
    //     'our_contact_person1_ctect'=>'nullable|max:10|min:10',
    //     'our_contact_person2_ctect'=>'nullable|max:10|min:10',
    //     'our_hr_ctect'=>'nullable|max:10|min:10',
    //     'cin_no'=>'required|',
    //     'tenure'=>'required|',
    //     'tenure_accelration'=>'required|',
    //     'tech_head'=>'required|',
    //     'account_person'=>'required|',
    //     'billing_person'=>'required|',
    //     'our_contact_person1'=>'required|',
    //     'our_contact_person2'=>'required|',
    //     'our_hr'=>'required|',
    //     'remail'=>'required|',
    //     'comp_type'=>'required|',

    // ]);


         $data= $request->validate([
        'name'=>'required',
        'gstin'=>'nullable',
        'pan_no'=>'nullable',
        'email'=>'nullable|',
        'state_code'=>'nullable',
        'city_code'=>'nullable',
        'correspondence_address'=>'nullable',
        'Registered_address'=>'nullable',
        'note'=>'nullable',
        'tech_head_ctect'=>'nullable',
        'billing_person_ctect'=>'nullable',
        'account_person_ctect'=>'nullable',
        'our_contact_person1_ctect'=>'nullable',
        'our_contact_person2_ctect'=>'nullable',
        'our_hr_ctect'=>'nullable',
        'cin_no'=>'nullable',
        'tenure'=>'nullable',
        'tenure_accelration'=>'nullable',
        'tech_head'=>'nullable',
        'account_person'=>'nullable',
        'billing_person'=>'nullable',
        'our_contact_person1'=>'nullable',
        'our_contact_person2'=>'nullable',
        'our_hr'=>'nullable',
        'remail'=>'nullable',
        'comp_type'=>'nullable',

    ]);
          $data['cli_code'] = "CLI-000-".$add; 
      //dd($data);


     	  Client::create($data);
        return redirect('client-list')->with('message','Client Add successfully');

    }

    public function details($id){
         $edit = Client::find($id);
    	return view('Client.details',compact('edit'));
    }

    public function edit($id){

       $edit = Client::find($id);
    	return view('Client.edit',compact('edit'));
    }

    public function update(Request $request,$id){
     // return "eryrey";
        //  $data= $request->validate([
        //     'name'=>'required|min:2|max:30',
        //     'gstin'=>'required|max:15|min:15|unique:gstin,gstin,'.$id,
        //     'pan_no'=>'required|max:10|min:10',
        //     'email'=>'nullable',
        //     'state_code'=>'required|',
        //     'city_code'=>'required|',
        //     'correspondence_address'=>'nullable',
        //     'Registered_address'=>'nullable',
        //     'note'=>'nullable',
        //     'contact'=>'nullable|max:10|min:10'

        // ]);
    // return explode('-',$request->cli_code);
      $data= $request->validate([
        'name'=>'required',
        'gstin'=>'nullable',
        'pan_no'=>'nullable',
        'email'=>'nullable|',
        'state_code'=>'nullable',
        'city_code'=>'nullable',
        'correspondence_address'=>'nullable',
        'Registered_address'=>'nullable',
        'note'=>'nullable',
        'tech_head_ctect'=>'nullable',
        'billing_person_ctect'=>'nullable',
        'account_person_ctect'=>'nullable',
        'our_contact_person1_ctect'=>'nullable',
        'our_contact_person2_ctect'=>'nullable',
        'our_hr_ctect'=>'nullable',
        'cin_no'=>'nullable',
        'tenure'=>'nullable',
        'tenure_accelration'=>'nullable',
        'tech_head'=>'nullable',
        'account_person'=>'nullable',
        'billing_person'=>'nullable',
        'our_contact_person1'=>'nullable',
        'our_contact_person2'=>'nullable',
        'our_hr'=>'nullable',
        'remail'=>'nullable',
        'comp_type'=>'nullable',

    ]);
      $data['cli_code'] = $request->cli_code."-".$request->idclient;
      // return $data;
           Client::where('id',$id)->update($data);
        return redirect('client-list')->with('message','Client Info Updated successfully');

    }

    public function delete($id){

       $dservice = Client::where('id', $id)->delete();
        return redirect()->back()->with('message','Client Is Successfully Removed From List');
    }

    public function getclient(Request $request){

        $data['rec'] = Client::find($request->id);
        $data['job'] = job_master::where('client_id',$request->id)->get();
        $data['ac']=AssignClient::with(['company'=>function($query){
          $query->select('name','id');
     }])->where('client_id',$request->id)->select('id','client_id','comp_id')->get();
        return $data;

    }

    public function get_c_client(Request $request){

       return AssignClient::with(['client'=>function($query){
        $query->select('name','id');
       }])->where('comp_id',$request->id)->select('id','client_id','comp_id')->get();
    }

    public function get_c_work(Request $request){

            return job_master::where('client_id',$request->id)->where('comp_id',$request->cid)->get();
    }



    public function get_s_details(Request $request){
          
          $saleslist = sales::where('job_id',$request->id)->where('comp_id',$request->cid)->get();
          $sum['sum'] = sales::where('job_id',$request->id)->where('comp_id',$request->cid)->get()->sum('gross_total_invoice_value');
          $sum['bamount'] = sales::where('job_id',$request->id)->where('comp_id',$request->cid)->get()->sum('base_amount_taxable_value');
          $sum['gst'] = sales::where('job_id',$request->id)->where('comp_id',$request->cid)->get()->sum('gst_amount');
          $sum['usd'] = sales::where('job_id',$request->id)->where('comp_id',$request->cid)->get()->sum('outstanding');
          $sum['cra'] = sales::where('job_id',$request->id)->where('comp_id',$request->cid)->get()->sum('total_ck_rec');


          return view('pages.sales_table',compact('saleslist','sum'));

    }

    public function getcityname(Request $request){

       return $city = City::where('city_code',$request->id)->first();


    }


     public function getclientbene(Request $request){
      
      $clients = beneficiary_add::all();
               
                foreach($clients as $cl){

                  $ids[] =  $cl->bg_request_id;
                }
                // return $ids;
                $array[] = ['Approved'];
        return BeneficiaryRequest::with('client')->whereNotIn('request_code',$ids)->where('status','Approved3')->get();

       }

       public function getbenfijob(Request $request){
       
       $bg = explode("||",$request->id);
       $jobid = BeneficiaryRequest::where('request_code',$bg[1])->first();
                return job_master::find($jobid->job_id);       


    }
       public function getbenfidetails(Request $request){

         $bg = explode("||",$request->id);
       $jobid = BeneficiaryRequest::where('request_code',$bg[1])->first();
        $data['job'] = job_master::find($jobid->job_id); 

       $data['bg'] = $bg[1];
       $data['client'] = Client::find($bg[0]);
       //return job_master::where('client_id',$request->id)->get();
       //$data['job'] = job_master::where('id',BeneficiaryRequest::find($request->id)->id)->first();
       $data['city'] =   City::where('city_code',Client::find($bg[0])->city_code)->first();
       $data['state'] = state::where('state_code',Client::find($bg[0])->state_code)->first();
       //$data['client'] = Client::find($request->id);
       return  $data;
    }

   

    public function importclient(Request $request){


         $datas = Excel::toCollection(new UsersImport,request()->file('excel_data'));
         
         $errors= array();
         $error_name = '';
         foreach ($datas as $data) {
          foreach($data as $items){
          
            $status = true;

            if($status){
              if(!preg_match("/^([0-9]){2}([a-zA-Z]){5}([0-9]){4}([a-zA-Z]){1}([0-9]){1}([a-zA-Z]){1}([0-9]){1}?$/", $items['gstin'])) { 
                $error_name = "NoT valid gstin"; 
                $status = 0;

                }else {  
                $status =  true;
                }
              }
           
               if($status){
              if(!preg_match("/^([a-zA-Z]){5}([0-9]){4}([a-zA-Z]){1}?$/", $items['pan_no'])) { 
                $error_name = "NoT valid Pan";
                $status = 0;
                }else{
                $status =  true;
                }
                }
          
                if($status){
                    if($items['state']){
                       $state = state::where('state_name',$items['state'])->first();
                       if($state != ''){
                       $status = true;
                     }else{
                      $status = 0;
                      $error_name = "State Name Does not Exit in databases";
                      $state = state::where('state_name',$items['state'])->first();
                     }
                    }else{
                      $status = 0;
                      $error_name = "State Name Does not Exit in databases";
                      $state = state::where('state_name',$items['state'])->first();
                    }
                }
                else{
                      $status = 0;
                      $error_name_for = "some field is filed unfilled";
                       $state = state::where('state_name',$items['state'])->first();
                }
                    //return $error_name."-".$status;

               if($status){
                    if($items['city']){
                      $city = City::where('city_name',$items['city'])->first();
                       if($city != ''){
                       $status = true;
                     }else{
                      $status = 0;
                      $error_name = "City Name Does not Exit in databases";
                      $city = City::where('city_name',$items['city'])->first();
                     }
                    }else{
                      $status = 0;
                      $error_name = "City Name Does not Exit in databases";
                      $city = City::where('city_name',$items['city'])->first();
                    }
                }
                else{
                      $status = 0;
                      $error_name2 = "some field is filed unfilled";
                      $city = City::where('city_name',$items['city'])->first();
                }

                if($status){
                    if($items['techincal_head'] != ''){
                        $status = true;
                    }else{
                      $status = 0;
                      $error_name = "Techincal Head Name Can not be Empty";
                    }
                }
              
                
                if($status){
                  if($items['techincal_head_contact'] != ''){
                  if(preg_match('/^[0-9]{10}+$/', $items['techincal_head_contact'])){
                     $status = true;
                  }else{

                    $status = 0;
                    $error_name = "Mobile no.is Invalid";
                  }
                }else{
                   $status = 0;
                   $error_name = "Mobile no.is can not be empty";

                }
                }
                

                if($status){
                    if($items['laxyo_employee1'] != ''){
                        $status = true;
                    }else{
                      $status = 0;
                      $error_name = "Laxyo Employee Name Can not be Empty";
                    }
                }
               
                
                if($status){
                  if($items['laxyo_employee1_contact'] != ''){
                  if(preg_match('/^[0-9]{10}+$/', $items['laxyo_employee1_contact'])){
                     $status = true;
                  }else{

                    $status = 0;
                    $error_name = "Mobile no.is Invalid";
                  }
                }else{
                   $status = 0;
                   $error_name = "Mobile no.is can not be empty";

                }
                }
               

                 if($status){
                    if($items['laxyo_employee2'] != ''){
                        $status = true;
                    }else{
                      $status = 0;
                      $error_name = "Laxyo Employee Name Can not be Empty";
                    }
                }
               
                
                if($status){
                  if($items['laxyo_employee2_contact'] != ''){
                  if(preg_match('/^[0-9]{10}+$/', $items['laxyo_employee2_contact'])){
                     $status = true;
                  }else{

                    $status = 0;
                    $error_name = "Mobile no.is Invalid";
                  }
                }else{
                   $status = 0;
                   $error_name = "Mobile no.is can not be empty";

                }
                }
            

                 if($status){
                    if($items['laxyo_hr'] != ''){
                        $status = true;
                    }else{
                      $status = 0;
                      $error_name = "Laxyo Employee Name Can not be Empty";
                    }
                }
              
                
                if($status){
                  if($items['laxyo_hr_contact'] != ''){
                  if(preg_match('/^[0-9]{10}+$/', $items['laxyo_hr_contact'])){
                     $status = true;
                  }else{

                    $status = 0;
                    $error_name = "Mobile no.is Invalid";
                  }
                }else{
                   $status = 0;
                   $error_name = "Mobile no.is can not be empty";

                }
                }
              

                if($status){
                  if($items['communication_email'] != ''){
                     if(preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix",$items['communication_email'])){
                       $status = true;
                    }else{

                    $status = 0;
                    $error_name ="communication_email Email is not valid";
                    }

                  }else{

                    $status = 0;
                    $error_name ="communication_email Email can not be empty";
                  }

                 }
                
                if($status){
                  if($items['email'] != ''){
                     if(preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix",$items['email'])){
                      $status = true;
                    }else{

                    $status = 0;
                    $error_name ="Email is not valid";;
                    }

                  }else{

                    $status = 0;
                    $error_name ="Email can not be empty";
                  }

                }
              

                 if($status){
                    if($items['company_type'] != ''){
                        $status = true;
                    }else{
                      $status = 0;
                      $error_name = "Company Type Name Can not be Empty";
                    }
                }
               

          if($status){
            $last_id  = DB::table('acco_re_client')->max('id');
            $add= $last_id+1;
              $array = array(
              'name' => $items['client'],
              'gstin' => $items['gstin'],
              'email' => $items['email'],
              'pan_no' => $items['pan_no'],
              'state_code' => ($state == '') ? 'state  not found' : $state->state_code,
              'city_code' => ($city == '') ? 'city  not found' : $city->city_code,
              'correspondence_address' => $items['correspond_address'],
              'Registered_address' => $items['register_address'],
              'note' => $items['note'],
              'comp_type' => $items['company_type'],
              'tenure' => $items['tenure'],
              'tenure_accelration' => $items['annual_escalation'],
              'cin_no' => $items['cin_no'],
              'tech_head' => $items['techincal_head'],
              'account_person' => $items['account_person'],
              'billing_person' => $items['billing_person'],
              'our_contact_person1' => (int)$items['laxyo_employee1'],
              'our_contact_person2' => (int)$items['laxyo_employee2'],
              'our_hr' => $items['laxyo_hr'],
              'tech_head_ctect' => $items['techincal_head_contact'],
              'account_person_ctect' => (int)$items['account_person_contact'],
              'billing_person_ctect' => (int)$items['billing_person_contact'],
              'our_contact_person1_ctect' => (int)$items['laxyo_employee1_contact'],
              'our_contact_person2_ctect' => (int)$items['laxyo_employee2_contact'],
              'our_hr_ctect' => $items['laxyo_hr_contact'],
              'remail' => $items['communication_email'],
              'cli_code' => "CLI-000-".$add,

             );
              //dd($array);

            Client::create($array);
          }else{

            //return $error_name;
              // return $city;
             $errors[] = array(
              'name' => $items['client'],
              'gstin' => $items['gstin'],
              'email' => $items['email'],
              'pan_no' => $items['pan_no'],
              'state_code' => ($state == '') ? 'state not found' : $state->state_name,
              'city_code' => ($city == '' ) ? 'city not found' : $city->city_name,
              'correspondence_address' => $items['correspond_address'],
              'Registered_address' => $items['register_address'],
              'note' => $items['note'],
              'comp_type' => $items['company_type'],
              'tenure' => $items['tenure'],
              'tenure_accelration' => $items['annual_escalation'],
              'cin_no' => $items['cin_no'],
              'tech_head' => $items['techincal_head'],
              'account_person' => $items['account_person'],
              'billing_person' => $items['billing_person'],
              'our_contact_person1' => $items['laxyo_employee1'],
              'our_contact_person2' => $items['laxyo_employee2'],
              'our_hr' => $items['laxyo_hr'],
              'tech_head_ctect' => $items['techincal_head_contact'],
              'account_person_ctect' => $items['account_person_contact'],
              'billing_person_ctect' => $items['billing_person_contact'],
              'our_contact_person1_ctect' => $items['laxyo_employee1_contact'],
              'our_contact_person2_ctect' => $items['laxyo_employee2_contact'],
              'our_hr_ctect' => $items['laxyo_hr_contact'],
              'remail' => $items['communication_email'],
              'error_filed' => $error_name,

             );
          }
    }        
  } 

  //return $errors;
     if(count($errors) !=0){
            return Excel::download(new UsersExport($errors), 'Client_data_error_sheet.xlsx');

        }else{
          
           return redirect()->route('client-list');
        }
}

    public function clientformat(){
    
      $path = storage_path('client_format.xls');
      return Response::download($path);
    }

    public function export() 
    {
        return Excel::download(new ClientExport, 'ClientDetails.xlsx');
    }  

}
