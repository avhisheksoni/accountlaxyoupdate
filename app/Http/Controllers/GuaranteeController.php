<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Guarantee;
use App\job_master;
use App\Beneficiary;
use App\beneficiary_add;
use App\bg_type_mast;
use App\Bank;
use App\BeneficiaryRequest;
use App\Client;
use App\Company_mast;
use App\bg_comm_mast;
use App\Imports\guaranteeImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\guaranteeEport;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Response;

class GuaranteeController extends Controller
{
    
    public function index(){
           
        $gurt=Guarantee::all(); 
        $sum = Guarantee::sum('bg_value');
        
        $beneficiary=beneficiary_add::all();
        $rer= beneficiary_add::selectRaw('count("client_id")')->select('client_id')->groupBy('client_id')->get();
        $bg_type=bg_type_mast::where('status_lc', '!=' , 'False')->get();
      //dd($gurt);  
    	return view("Guarantee.guarantee-list",compact('job','beneficiary','sum','bg_type','gurt','rer'));
    }

    public function store(Request $request){
           
    	     $data = $request->validate([  
          'job_code'=>'required',
          'job_name'=>'required',     
          'beneficiary_id'=>'required',                       
          'bg_code'=>'required', 
          'comp_id'=>'required',                      
          ]);
        $insert = Guarantee::create($data);
        $insert->id;
       return redirect()->route('guarantee-request-edit',['id'=>$insert->id]);
    }

    public function edit($id){
          
          $edit['bg_code']=Guarantee::find($id);
         $code = $edit['bg_code']->bg_code;
         $bcr = bg_comm_mast::all();
         $edit['req'] = BeneficiaryRequest::where('request_code',$code)->first();
         //return $edit['req'];
         return view('Guarantee.guarantee-edit',compact('edit'));
    }

    public  function  getbranch(Request $request){

    	 $bank_id=$request->id;

        return $branch=Bank::find($bank_id)->branch;
        
    }

    public function update(Request $request ,$id){
      //dd($request->all());
     $data = $request->validate([  
          // 'job_code'=>'required',      
          'beneficiary_id'=>'required',                       
          'bank_code'=>'required',                       
          'bank_branch'=>'required',                       
          'bg_code'=>'nullable',                       
          'amended_from_bg_code'=>'nullable',                       
          'amended_by_bg_no'=>'nullable',                       
          'bg_no'=>'nullable',                       
          'bg_date'=>'required',                       
          'application_no'=>'required',                                     
          'bg_note'=>'required',                                        
          'job_name'=>'required',                                          
          'bg_value'=>'required',                                         
          'expiry_date'=>'required',                       
          'claim_expiry_date'=>'required',                       
          'margrin_percentage'=>'required',                       
          'margin_amount'=>'required',                       
          'bg_commission'=>'nullable',                       
          'bg_commission_amount'=>'nullable',                       
          'status'=>'required',                       
          'tender_no'=>'required',                      
          'bg_date1'=>'nullable',                      
          'bg_date2'=>'nullable',                      
          'bg_date3'=>'nullable',                      
          'bg_date4'=>'nullable',                      
          //'file'=>'nullable',                       
          ]);
     // dd($data);
       if($request->file == ""){
        $data['file'] =  $request->old_file;
       }else{
       $data['file'] =  storage::putfile('public/guarantee',$request->file('file'));
       }
         //$arraymap = array_map('trim', $data);
          //dd($data);

       // $request->file->store('public/guarantee');
       //                 storage::putfile('public/guarantee',$request->file('file'));
      //dd($data);
        Guarantee::where('id',$id)->update($data);
        return redirect('guarantee-list')->with('message','Request Is Successfully Updated'); 


    }
     public function details($id){
         
        //  $edit = Guarantee::find($id);
        // return view('Guarantee.guarantee-details',compact('edit'));
                $edit['bg_code']=Guarantee::find($id);
         $code = $edit['bg_code']->bg_code;
         $edit['req'] = BeneficiaryRequest::where('request_code',$code)->first();
         // return $edit;
         return view('Guarantee.guarantee-details',compact('edit'));
      
    }
     public function delete($id){
   
   $dservice = Guarantee::where('id', $id)->delete();
      return redirect()->back()->with('message','Guarantee Request  Is Successfully Removed From List');

  }

  public function approval($id){
     
     $data['status'] = "Requested";
     $appr = Guarantee::where('id',$id)->update($data);
     return redirect('guarantee-list')->with('message','Request Send For Approval');
  }
   public function approvallist(){
           
        $gurt=Guarantee::where('status','Requested')->orwhere('status','Approved-level-1')->paginate(10);;
        $job=job_master::all();
        $beneficiary=Beneficiary::all();
        $bg_type=bg_type_mast::all();

           return view('Guarantee.guarantee-requested-list',compact('job','beneficiary','bg_type','gurt'));
  }

  public function sadminapproval($id){

      $data['status'] = "Approved-level-1";
     $appr = Guarantee::where('id',$id)->update($data);
     return redirect('guarantee-approval-list')->with('message','Request Approved By Super Admin');
  }

    public function getcmpg(Request $request){

     $bgname = beneficiary_add::selectRaw('count("client_id")')->select('client_id')->where('comp_id',$request->id)->groupBy('client_id')->get()->pluck('client_id');
     return Client::whereIN('id',$bgname)->get();
  }

   public function getbgcode(Request $request){
      $guat = Guarantee::all()->where('bg_code','!=', null)->pluck('bg_code');
      $arry = ['BG-13','BG-11','BG-9'];
      // return $gua;
      // return $request->id;
      $data = beneficiary_add::where('client_id',$request->id)->whereNotIN('bg_request_id',$guat)->get();
      $bgcode[] = '';
      foreach($data as $bg){

        $bgcode[] = $bg->bg_request_id;
      }
     
      //return $bgcode;
      return $jobname = BeneficiaryRequest::whereIn('request_code',$bgcode)->where('beneficiary_id',$request->id)->where('status','Approved3')->get();
  }

  public function getbgshow(Request $request){

    $job_id = BeneficiaryRequest::select('job_id')->where('request_code',$request->id)->first();
    
    return job_master::find($job_id['job_id']);
  }

  public function importgurantee(Request $request){
            //return "avhitete";
          $datas = Excel::toCollection(new guaranteeImport,request()->file('excel_data'));
           //return $datas;

         
          $errors= array();
          $error_name = '';
          foreach ($datas as $data) {
            foreach ($data as $items) {
                    $status = true;
              //return $items['bg_date'] ;//Date::excelToDateTimeObject($items['bg_date'])->format('Y-m-d');
                     if($status){
                    if($items['company'] != ''){
                        $status = true;
                    }else{
                      $status = 0;
                      $error_name = "Company Can not be Empty";
                    }
                }
                // else{
                //       $status = 0;
                //       $error_name = "some field is filed unfilled";
                // }

                  if($status){
                    if($items['beneficiary'] != ''){
                        $status = true;
                    }else{
                      $status = 0;
                      $error_name = "Beneficiary Can not be Empty";
                    }
                }
                // else{
                //       $status = 0;
                //       $error_name = "some field is filed unfilled";
                // }

                if($status){
                    if($items['tender_no'] != ''){
                        $status = true;
                    }else{
                      $status = 0;
                      $error_name = "Tender No. Can not be Empty";
                    }
                }
                // else{
                //       $status = 0;
                //       $error_name = "some field is filed unfilled";
                // }

                 if($status){
                    if($items['jobwork_name'] != ''){
                        $status = true;
                    }else{
                      $status = 0;
                      $error_name = "Job/Work-Name  Can not be Empty";
                    }
                }
                // else{
                //       $status = 0;
                //       $error_name = "some field is filed unfilled";
                // }

                 if($status){
                    if($items['value'] != ''){
                        $status = true;
                    }else{
                      $status = 0;
                      $error_name = "BG value Can not be Empty";
                    }
                }
                // else{
                //       $status = 0;
                //       $error_name = "some field is filed unfilled";
                // }

                if($status){
                    if($items['bg_date'] != ''){
                        $status = true;
                    }else{
                      $status = 0;
                      $error_name = "BG_Date  Can not be Empty";
                    }
                }
                // else{
                //       $status = 0;
                //       $error_name = "some field is filed unfilled";
                // }

                 if($status){
                    if($items['expiry_date'] != ''){
                        $status = true;
                    }else{
                      $status = 0;
                      $error_name = "Expiry Date  Can not be Empty";
                    }
                }
                // else{
                //       $status = 0;
                //       $error_name = "some field is filed unfilled";
                // }

                 if($status){
                    if($items['claim_expiry_date'] != ''){
                        $status = true;
                    }else{
                      $status = 0;
                      $error_name = "Claim Expiry Date  Can not be Empty";
                    }
                }
                // else{
                //       $status = 0;
                //       $error_name = "some field is filed unfilled";
                // }

                 if($status){
                    if($items['issuer_bank'] != ''){
                        $status = true;
                    }else{
                      $status = 0;
                      $error_name = "Issuer Bank  Can not be Empty";
                    }
                }
                // else{
                //       $status = 0;
                //       $error_name = "some field is filed unfilled";
                // }

                if($status){
                    if($items['bank_guarantee_no'] != ''){
                        $status = true;
                    }else{
                      $status = 0;
                      $error_name = "Bank Guarantee_No.  Can not be Empty";
                    }
                }
                // else{
                //       $status = 0;
                //       $error_name = "some field is filed unfilled";
                // }

                if($status){
                    if($items['bank_guarantee_no'] != ''){
                        $status = true;
                    }else{
                      $status = 0;
                      $error_name = "Bank Guarantee_No.  Can not be Empty";
                    }
                }
                // else{
                //       $status = 0;
                //       $error_name = "some field is filed unfilled";
                // }

                if($status){
                    if($items['status'] != ''){
                        $status = true;
                    }else{
                      $status = 0;
                      $error_name = "Status  Can not be Empty";
                    }
                }
                // else{
                //       $status = 0;
                //       $error_name = "some field is filed unfilled";
                // }


                 if($status){
                    if($items['margrin'] != ''){
                        $status = true;
                    }else{
                      $status = 0;
                      $error_name = "margrin %  Can not be Empty";
                    }
                }
                // else{
                //       $status = 0;
                //       $error_name = "some field is filed unfilled";
                // }

                 if($status){
                    if($items['margin_amount'] != ''){
                        $status = true;
                    }else{
                      $status = 0;
                      $error_name = "margin amount  Can not be Empty";
                    }
                }
                // else{
                //       $status = 0;
                //       $error_name = "some field is filed unfilled";
                // }


                 if($status){
                    if($items['bg_commission'] != ''){
                        $status = true;
                    }else{
                      $status = 0;
                      $error_name = "BG commission  Can not be Empty";
                    }
                }
                // else{
                //       $status = 0;
                //       $error_name = "some field is filed unfilled";
                // }

                 if($status){
                    if($items['bg_commission_amount'] != ''){
                        $status = true;
                    }else{
                      $status = 0;
                      $error_name = "BG commission Amount  Can not be Empty";
                    }
                }
                // else{
                //       $status = 0;
                //       $error_name = "some field is filed unfilled";
                // }

                if($status){
                    if($items['bg_type'] != ''){
                        $status = true;
                    }else{
                      $status = 0;
                      $error_name = "BG Type   Can not be Empty";
                    }
                }
                // else{
                //       $status = 0;
                //       $error_name = "some field is filed unfilled";
                // }
                if($status){
                    if($items['purpose'] != ''){
                        $status = true;
                    }else{
                      $status = 0;
                      $error_name = "BG Purose   Can not be Empty";
                    }
                }
                // else{
                //       $status = 0;
                //       $error_name = "some field is filed unfilled";
                // }
              //return $items['purpose']."-".$error_name."-".$status;
                  //dd(gettype($items['claim_expiry_date']));
                if($status){
              $array = array(
              'company_imp' => $items['company'],
              'beneficiary_imp' => $items['beneficiary'],//Date::excelToDateTimeObject($items['bg_date'])->format('Y-m-d'),
              'tender_no_imp' => $items['tender_no'],
              'Job_Work_Name_imp' => $items['jobwork_name'],
              'issuer_bank_imp' => $items['issuer_bank'],
              'bg_value' => $items['value'],
              'bg_date' => (gettype($items['bg_date']) == 'string') ? $items['bg_date'] : Date::excelToDateTimeObject($items['bg_date'])->format('Y-m-d'),



              'expiry_date' => (gettype($items['expiry_date']) == 'string') ? $items['expiry_date'] : Date::excelToDateTimeObject($items['expiry_date'])->format('Y-m-d'),
              'claim_expiry_date' => (gettype($items['claim_expiry_date']) == 'string') ? $items['claim_expiry_date'] : Date::excelToDateTimeObject($items['claim_expiry_date'])->format('Y-m-d'),
              'bg_no' => $items['bank_guarantee_no'],
              'status_imp' => $items['status'],
              'margrin_percentage' => $items['margrin'],
              'margin_amount' => $items['margin_amount'],
              'bg_commission' => $items['bg_commission'],
              'bg_commission_amount' => $items['bg_commission_amount'],
              'bg_type_imp' => $items['bg_type'],
              'purpose_bg_missing' => $items['purpose'],
             

             );
            //dd($array);

            Guarantee::create($array);
          }else{

            //return $error_name;
              // return $city;
             $errors[] = array(
              'company_imp' => $items['company'],
              'beneficiary_imp' => $items['beneficiary'],
              'tender_no_imp' => $items['tender_no'],
              'Job_Work_Name_imp' => $items['jobwork_name'],
              'issuer_bank_imp' => $items['issuer_bank'],
              'bg_value' => $items['value'],
              'bg_date' => (gettype($items['bg_date']) == 'string') ? $items['bg_date'] : Date::excelToDateTimeObject($items['bg_date'])->format('Y-m-d'),
              'expiry_date' => (gettype($items['expiry_date']) == 'string') ? $items['expiry_date'] : Date::excelToDateTimeObject($items['expiry_date'])->format('Y-m-d'),
              'claim_expiry_date' => (gettype($items['claim_expiry_date']) == 'string') ? $items['claim_expiry_date'] : Date::excelToDateTimeObject($items['claim_expiry_date'])->format('Y-m-d'),
              'bg_no' => $items['bank_guarantee_no'],
              'status_imp' => $items['status'],
              'margrin_percentage' => $items['margrin'],
              'margin_amount' => $items['margin_amount'],
              'bg_commission' => $items['bg_commission'],
              'bg_commission_amount' => $items['bg_commission_amount'],
              'bg_type_imp' => $items['bg_type'],
              'purpose_bg_missing' => $items['purpose'],
              'error_filed' => $error_name,

             );
          }

            }
            
          }
         if(count($errors) !=0){
            return Excel::download(new guaranteeEport($errors), 'guarantee_data_error_sheet.xlsx');

        }else{
          

           return redirect()->route('guarantee-list');
        }
  }

  public function guaformat(){

     $path = storage_path('guarantee_format.xls');
      return Response::download($path);
  }

  public function tempedit($id){
     
     $temp_edit = Guarantee::find($id);
     return view('Guarantee.guarantee-temp-edit',compact('temp_edit'));


  }

  public function tempupdate(Request $request , $id){
    
    //dd($request->beneficiary_imp);
    $data = $request->validate([     
          'beneficiary_id'=>'nullable',                       
          'bank_code'=>'nullable',                       
          'bank_branch'=>'nullable',                       
          'bg_code'=>'nullable',                       
          'amended_from_bg_code'=>'nullable',                       
          'amended_by_bg_no'=>'nullable',                       
          'bg_no'=>'nullable',                       
          'bg_date'=>'nullable',                       
          'application_no'=>'nullable',                                     
          'bg_note'=>'nullable',                                        
          'job_name'=>'nullable',                                          
          'bg_value'=>'nullable',                                         
          'expiry_date'=>'nullable',                       
          'claim_expiry_date'=>'nullable',                       
          'margrin_percentage'=>'nullable',                       
          'margin_amount'=>'nullable',                       
          'bg_commission'=>'nullable',                       
          'bg_commission_amount'=>'nullable',                       
          'status'=>'nullable',                       
          'tender_no'=>'nullable',                      
          'bg_date1'=>'nullable',                      
          'bg_date2'=>'nullable',                      
          'bg_date3'=>'nullable',                      
          'bg_date4'=>'nullable',                      
          'company_imp'=>'nullable',                      
          'beneficiary_imp'=>'nullable',                      
          'tender_no_imp'=>'nullable',                      
          'Job_Work_Name_imp'=>'nullable',                      
          'issuer_bank_imp'=>'nullable',                     
          'status_imp'=>'nullable',                     
          'purpose_bg_missing'=>'nullable',                     
          'bg_type_imp'=>'nullable',                                        
          //'file'=>'nullable',                       
          ]);
                Guarantee::where('id',$id)->update($data);
            
               return redirect()->back();
  }
}
