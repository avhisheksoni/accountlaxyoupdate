<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PurchaseClient;
use App\PassignClient;
use App\PJobMast;
use App\PurchaseModel;
use App\City;
use App\state;
use App\Imports\CompImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CompExport;
use App\Imports\UsersImport;
use App\Exports\VendorExport;

class PurchaseClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $pclient = PurchaseClient::paginate(10);
        return view('PurchaseClient.index',compact('pclient'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('PurchaseClient.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request->ifsc_code;
         $data= $request->validate([
            'name'=>'required|min:2|max:30',
            'gstin'=>'required|max:15|min:15|unique:acco_re_client',
            'pan_no'=>'required|max:10|min:10',
            'email'=>'required',
            'state_code'=>'required',
            'city_code'=>'required',
            'correspondence_address'=>'nullable',
            'Registered_address'=>'required',
            'note'=>'nullable',
            'tenure'=>'required',
            'tenure_accelration'=>'required',
            'petty_owner'=>'required',
            'petty_owner_contact'=>'nullable|max:10|min:10',
            // 'petty_owner_email'=>'required',
            'comp_type'=>'required',
            'bank_name'=>'required',
            'branch_address'=>'required',
            'account_no'=>'required',
            'ifsc_code'=>'required',

        ]);
         //dd($data);
          PurchaseClient::create($data);
        return redirect('PurchaseClient')->with('message','Purchase-Client Add successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    { 

         $edit = PurchaseClient::find($id);
         return view('PurchaseClient.details',compact('edit'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
         $edit = PurchaseClient::find($id);
         return view('PurchaseClient.edit',compact('edit'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request);
         $data= $request->validate([
            'name'=>'required|min:2|max:30',
            'gstin'=>'required|max:15|min:15|unique:acco_re_client',
            'pan_no'=>'required|max:10|min:10',
            'email'=>'required',
            'state_code'=>'required',
            'city_code'=>'required',
            'correspondence_address'=>'nullable',
            'Registered_address'=>'required',
            'note'=>'nullable',
            'our_contact_person1_ctect'=>'nullable|max:10|min:10',
            'our_contact_person2_ctect'=>'nullable|max:10|min:10',
            'our_hr_ctect'=>'nullable|max:10|min:10',
            'cin_no'=>'required',
            'tenure'=>'required',
            'tenure_accelration'=>'required',
            'petty_owner'=>'required',
            'petty_owner_contact'=>'nullable|max:10|min:10',
            'petty_owner_email'=>'required',
            'our_contact_person1'=>'required',
            'our_contact_person2'=>'required',
            'our_hr'=>'required',
            'comp_type'=>'required'

    ]);
          PurchaseClient::where('id',$id)->update($data);
        return redirect('PurchaseClient')->with('message','Purchase-Client Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $dservice = PurchaseClient::where('id', $id)->delete();
      return redirect()->back()->with('message','Purchase Client  Is Successfully Removed From List');
    }

    public function get_r_company(Request $request){
       
          return PassignClient::with(['petty'=>function($query){
            $query->select('id','firm_name');
          }])->where('comp_id',$request->id)->select('comp_id','client_id','id')->get();
    }

    public function get_c_work(Request $request){
         return PJobMast::where('client_id',$request->id)->where('comp_id',$request->cid)->get();

    }

    public function get_w_details(Request $request){

        $purchaselist = PurchaseModel::where('job_id',$request->id)->where('comp_id',$request->cid)->get();
        $data['gross'] = PurchaseModel::where('job_id',$request->id)->where('comp_id',$request->cid)->get()->sum('gross_total_invoice_value');
        $data['bamt'] = PurchaseModel::where('job_id',$request->id)->where('comp_id',$request->cid)->get()->sum('base_amount_taxable_value');
        $data['cra'] = PurchaseModel::where('job_id',$request->id)->where('comp_id',$request->cid)->get()->sum('total_ck_rec');
        $data['gst'] = PurchaseModel::where('job_id',$request->id)->where('comp_id',$request->cid)->get()->sum('gst_amount');
        $data['usd'] = PurchaseModel::where('job_id',$request->id)->where('comp_id',$request->cid)->get()->sum('outstanding');

        return view('pages.purchase_table',compact('purchaselist','data'));

    }

   public function companyexcel(Request $request){
             // return 
         $datas = Excel::toCollection(new CompImport,request()->file('excel_data'));
         // dd($datas);
             $status = true;
             $errors= array();
             $error_name = '';
          foreach ($datas as $data ) {
             foreach ($data as $items ) {
                 //dd($items);
                  if(!preg_match("/^([0-9]){2}([A-Za-z]){5}([0-9]){4}([A-Za-z]){1}([0-9]{1})([A-Za-z]){2}?$/", $items['gstin'])) { 
                $error_name = "NoT valid gstin"; 
                $status = 0; 
                }else {  
                $status =  true;
                }
                if($status){

                       $array = array(
              'name' => $items['company'],
              'gstin' => $items['gstin'],

             );

            PurchaseClient::create($array);

                }else{

             $errors[] = array(
              'Company' => $items['company'],
              'gstin' => $items['gstin'],
              'Error field' => $error_name,
             );
          }
                 
            }
          }
          
          if(count($errors) !=0){
            return Excel::download(new CompExport($errors), 'Company_data_error_sheet.xlsx');

        }else{
           return redirect()->route('PurchaseClient.index');
        }

   }

   public function importclient(Request $request){

         $datas = Excel::toCollection(new UsersImport,request()->file('excel_data'));
        
         $status = true;
         $errors= array();
         $error_name = '';
         foreach ($datas as $data) {
          foreach($data as $items){
           // dd($items);
            // echo $status; die;
            if($status){
              if(!preg_match("/^([0-9]){2}([A-Za-z]){5}([0-9]){4}([A-Za-z]){1}([0-9]{1})([A-Za-z]){2}?$/", $items['gstin'])) { 
                $error_name = "NoT valid gstin"; 
                $status = 0;

                }else {  
                $status =  true;
                }
              }
              // else{

              //   $error_name = "NoT valid gstin"; 
              //   $status = 0; 
              // }

               if($status){
              if(!preg_match("/^([a-zA-Z]){5}([0-9]){4}([a-zA-Z]){1}?$/", $items['pan_no'])) { 
                $error_name = "NoT valid Pan";
                $status = 0;
                }else{
                $status =  true;
                }
                }
           // 
                // else{
                //   $error_name = "some field is filed unfilled";
                //    $status = 0;
                // }
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
                }else{
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
                    if($items['petty_contactor_owner'] != ''){
                        $status = true;
                    }else{
                      $status = 0;
                      $error_name = "Petty contactor owner Name Can not be Empty";
                    }
                }


                if($status){
                  if($items['owner_contact'] != ''){
                  if(preg_match('/^[0-9]{10}+$/', $items['owner_contact'])){
                     $status = true;
                  }else{

                    $status = 0;
                    $error_name = "Owner Mobile no.is Invalid";
                  }
                }else{
                   $status = 0;
                   $error_name = "Owner Mobile no.is can not be empty";

                }
                } 
                
               
                //  if($status){
                //     if($items['laxyo_hr'] != ''){
                //         $status = true;
                //     }else{
                //       $status = 0;
                //       $error_name = "Laxyo Employee Name Can not be Empty";
                //     }
                // }
                

                if($status){
                  if($items['owner_email'] != ''){
                     if(preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix",$items['owner_email'])){
                      $status = true;
                    }else{

                    $status = 0;
                    $error_name ="Owner Email is not valid";;
                    }

                  }else{

                    $status = 0;
                    $error_name ="Owner Email can not be empty";
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
                    if($items['tenure'] != ''){
                        $status = true;
                    }else{
                      $status = 0;
                      $error_name = "Tenure Name Can not be Empty";
                    }
                }
                

                 if($status){
                    if($items['annual_escalation'] != ''){
                        $status = true;
                    }else{
                      $status = 0;
                      $error_name = "Annual Escalation  Name Can not be Empty";
                    }
                }
              
                 
                 if($status){
                    if($items['contactor'] != ''){
                        $status = true;
                    }else{
                      $status = 0;
                      $error_name = "Contactor Name Can not be Empty";
                    }
                }


                 if($status){
                    if($items['bank'] != ''){
                        $status = true;
                    }else{
                      $status = 0;
                      $error_name = "Bank Name Can not be Empty";
                    }
                }

                if($status){
                    if($items['bank_branch_name'] != ''){
                        $status = true;
                    }else{
                      $status = 0;
                      $error_name = "Bank Branch  Can not be Empty";
                    }
                }


                if($status){
                    if($items['ac_number'] != ''){
                        $status = true;
                    }else{
                      $status = 0;
                      $error_name = "A/C Number  Can not be Empty";
                    }
                }

                if($status){
                    if($items['ifsc_code'] != ''){
                        $status = true;
                    }else{
                      $status = 0;
                      $error_name = "IFSC Code  Can not be Empty";
                    }
                }

// return $error_name."-".$status."-".$items['ifsc_code'];




              



              //return $error_name."-".$status."-".$items['cin_no'];


          if($status){
              $array = array(
              'name' => $items['contactor'],
              'gstin' => $items['gstin'],
              'email' => $items['owner_email'],
              'pan_no' => $items['pan_no'],
              'state_code' => ($state == '') ? 'state  not found' : $state->state_code,
              'city_code' => ($city == '') ? 'city  not found' : $city->city_code,
              'correspondence_address' => $items['correspond_address'],
              'Registered_address' => $items['registered_address'],
              'note' => $items['note'],
              'comp_type' => $items['company_type'],
              'tenure' => $items['tenure'],
              'tenure_accelration' => $items['annual_escalation'],
             // 'cin_no' => $items['cin_no'],
              'petty_owner' => $items['petty_contactor_owner'],
              'petty_owner_contact' => $items['owner_contact'],
              'petty_owner_email' => $items['owner_email'],
              'bank_name' => $items['bank'],
              'branch_address' => $items['bank_branch_name'],
              'ifsc_code' => $items['ifsc_code'],
              'account_no' => $items['ac_number'],
              // 'our_contact_person2_ctect' => $items['laxyo_employee2_contact'],
              // 'our_hr_ctect' => $items['laxyo_hr_contact'],
              //'remail' => $items['communication_email'],

             );
              //dd($array);

            PurchaseClient::create($array);
          }else{

            //return $error_name;
              // return $city;
                 $errors[] = array(
                  'name' => $items['contactor'],
                  'gstin' => $items['gstin'],
                  'email' => $items['owner_email'],
                  'pan_no' => $items['pan_no'],
                  'state_code' => ($state == '') ? 'state not found' : $state->state_name,
                  'city_code' => ($city == '' ) ? 'city not found' : $city->city_name,
                  'correspondence_address' => $items['correspond_address'],
                  'Registered_address' => $items['registered_address'],
                  'note' => $items['note'],
                  'comp_type' => $items['company_type'],
                  'tenure' => $items['tenure'],
                  'tenure_accelration' => $items['annual_escalation'],
                  //'cin_no' => $items['cin_no'],
                  'petty_owner' => $items['petty_contactor_owner'],
                  'petty_owner_contact' => $items['owner_contact'],
                  'petty_owner_email' => $items['owner_email'],
                  'bank_name' => $items['bank'],
                  'branch_address' => $items['bank_branch_name'],
                  'ifsc_code' => $items['ifsc_code'],
                  'account_no' => $items['ac_number'],
                  'error_filed' => $error_name,

                 );
                }
            }        
        } 

        if(count($errors) !=0){
            return Excel::download(new CompExport($errors), 'pettyContrator_error_sheet.xlsx');

        }else{
          
           return redirect()->route('PurchaseClient.index');
        }
    }

    public function export() 
    {
        return Excel::download(new VendorExport, 'VendorDetails.xlsx');
    }  
    
}