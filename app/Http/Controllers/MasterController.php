<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\job_master;
use App\tax_gst;
use App\TaxTdsmodel;
use App\Gstin;
use App\Client;
use App\Company_mast;
use App\job_categorgy;
use App\PurchaseStoreItem;
use App\PurchaseItem;
use App\site_item_quantity;
use App\Imports\CjobImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\cjobExport;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Illuminate\Support\Facades\DB;
use Response;

class MasterController extends Controller
{
    public function index(){

    	return view('Master.index');
    }

     public function joblist(){

       $job = job_master::orderBy('id', 'DESC')->get();
       return view("Master.job-list",compact('job'));
    }

    public function jobcreate(){

      $gst = tax_gst::all();
      $tds = TaxTdsmodel::all();
      $gstin = Gstin::all();
      $client = Client::all();
      $comp = Company_mast::all();
      $cat = job_categorgy::all();
      return view('Master.createjob',compact('gst','tds','gstin','client','comp','cat'));

    }

    public function jobstore(Request $request){
     
       //return PurchaseStoreItem::all();
     $catcode = job_categorgy::find($request->job_cat_id)->name;
     $clecode = Client::find($request->client_id)->name;//substr($request->gsstin_uin_of_recipient,0,2).
     $unJob_id = strtoupper(substr($catcode,0,3).substr($clecode,0,4));
      $last_id  = DB::table('acco_job_master')->max('id');
    	 $add= $last_id+1;
     //return $unJob_id.$add;
      // $data = $request->validate([  
      //      'job_describe'=>'required',                           
      //     'tender_no'=>'required',                           
      //     'location'=>'required',                           
      //     'tax_gst'=>'required|numeric',                           
      //     'tax_tds'=>'required|numeric',                           
      //     'sd_percentage'=>'required|numeric',                           
      //     'place_of_supply'=>'required',                           
      //     'client_id'=>'required',                           
      //     'comp_id'=>'required',                           
      //     'e_commerece_gstin'=>'required',                  
      //     'tender_value'=>'required',                  
      //     'tender_rate'=>'required',                  
      //     'work_order_no'=>'required',                  
      //     'work_value'=>'required',                  
      //     'work_s_data'=>'required',                  
      //     'Work_end_date'=>'required',                
      //     'job_cat_id'=>'required'                 
      //     ]);

       $data = $request->validate([  
           'job_describe'=>'required',                           
          'tender_no'=>'nullable',                           
          'location'=>'nullable',                           
          'tax_gst'=>'required|numeric',                           
          'tax_tds'=>'required|numeric',                           
          'sd_percentage'=>'nullable|numeric',                           
          'place_of_supply'=>'nullable',                           
          'client_id'=>'required',                           
          'comp_id'=>'required',                           
          'e_commerece_gstin'=>'nullable',                  
          'tender_value'=>'nullable',                  
          'tender_rate'=>'nullable',                  
          'work_order_no'=>'nullable',                  
          'work_value'=>'nullable',                  
          'work_s_data'=>'nullable',                  
          'Work_end_date'=>'nullable',                
          'job_cat_id'=>'required'                 
          ]);
      //dd($data);
        $data['job_code'] = $unJob_id.$add; 
        job_master::create($data);
       $qnty = site_item_quantity::where('site_id',$add)->get();
       if(count($qnty) == 0){
          $prch = PurchaseStoreItem::all();
        foreach($prch as $item){
          $zqi['item_id'] = $item->item_number;
          $zqi['quantity'] = 0;
          $zqi['site_id'] = $add;
          $zqi['unit_id'] = $item->prch_item->unit_id;
          $zqi['cons_id'] = $item->prch_item->cons_id;
          $zqi['current_date'] = date('Y-m-d');
          $zqi['wareh_id'] = $item->warehouse_id;
          site_item_quantity::create($zqi);
        }
       }else{
        return  "update here";
       }
    	return redirect()->route('job-list');
      

    }

    public function jobedit($id){
      
      $edit = job_master::find($id);
      return view('Master.job-edit',compact('edit'));

    }

    public function jobupdate(Request $request,$id){
       

      // $data = $request->validate([  
      //      'job_describe'=>'required',                           
      //     'tender_no'=>'required',                           
      //     'location'=>'required',                           
      //     'tax_gst'=>'required|numeric',                           
      //     'tax_tds'=>'required|numeric',                           
      //     'sd_percentage'=>'required|numeric',                           
      //     'place_of_supply'=>'required',                           
      //     'client_id'=>'required',                           
      //     'comp_id'=>'required',                           
      //     'e_commerece_gstin'=>'required',                  
      //     'tender_value'=>'required',                  
      //     'tender_rate'=>'required',                  
      //     'work_order_no'=>'required',                  
      //     'work_value'=>'required',                  
      //     'work_s_data'=>'required',                  
      //     'Work_end_date'=>'required'                    
      //     ]);
       $data = $request->validate([  
           'job_describe'=>'required',                           
          'tender_no'=>'nullable',                           
          'location'=>'nullable',                           
          'tax_gst'=>'required|numeric',                           
          'tax_tds'=>'required|numeric',                           
          'sd_percentage'=>'nullable|numeric',                           
          'place_of_supply'=>'nullable',                           
          'client_id'=>'required',                           
          'comp_id'=>'required',                           
          'e_commerece_gstin'=>'nullable',                  
          'tender_value'=>'nullable',                  
          'tender_rate'=>'nullable',                  
          'work_order_no'=>'nullable',                  
          'work_value'=>'nullable',                  
          'work_s_data'=>'nullable',                  
          'Work_end_date'=>'nullable',                
          'job_cat_id'=>'nullable'                 
          ]);
        job_master::where('id',$id)->update($data);
        // uncommit when item is not present in item_quantity
         return $prch = PurchaseStoreItem::all();
        foreach($prch as $item){
          $zqi['item_id'] = $item->item_number;
          $zqi['quantity'] = 0;
          $zqi['site_id'] = $id;
          $zqi['unit_id'] = $item->prch_item->unit_id;
          $zqi['cons_id'] = $item->prch_item->cons_id;
          $zqi['current_date'] = date('Y-m-d');
          $zqi['wareh_id'] = $item->warehouse_id;
          site_item_quantity::create($zqi);
        }
      return redirect()->route('job-list');
    }

    public function jobdelete($id){
       
        $dservice = job_master::where('id', $id)->delete();
      return redirect()->back()->with('message','Job/Work Name  Is Successfully Removed');
    }

     public function details($id){

      $edit = job_master::find($id);
      return view('Master.job-details',compact('edit'));
    }

    public function clientjobexcel(Request $request){
       
        $datas = Excel::toCollection(new CjobImport,request()->file('excel_data'));
            
             $status = true;
             $errors= array();
             $error_name = '';
         foreach ($datas as $coll) {
          foreach ($coll as $items) {
               // return $items;
                if($items['jobwork_name'] != ''){
                    $status = true;
                }else{
                     $status  = 0;
                     $error_name = "Site Name Required"; 
                }
                if($status){
                   if($items['tender_no'] != ''){
                    $status = true;
                }else{
                     $status  = 0;
                    $error_name = "Tender no is not found"; 
                }
                }

                if($status){
                  // return gettype($items['tendor_value']);
                   if($items['tendor_value'] != ''){
                    if(is_numeric($items['tendor_value'])){
                       $status = true;
                     }else{
                    $status = 0;
                     $error_name = "Tender value should we Numeric"; 
                  }
                }else{
                     $status  = 0;
                    $error_name = "Tender value is not found"; 
                }
                }

                  if($status){
                   if($items['tendor_rate'] != ''){
                    $status = true;
                }else{
                     $status  = 0;
                    $error_name = "Tender Rate is not found"; 
                }
                }

                  if($status){
                   if($items['work_order_no'] != ''){
                    $status = true;
                }else{
                     $status  = 0;
                    $error_name = "Work Order No is not found"; 
                }
                }

                 if($status){
                  // return gettype($items['tendor_value']);
                   if($items['work_value'] != ''){
                    if(is_numeric($items['work_value'])){
                       $status = true;
                     }else{
                    $status = 0;
                     $error_name = "Work value should we Numeric"; 
                  }
                }else{
                     $status  = 0;
                    $error_name = "Work value is not found"; 
                }
                }

                 if($status){
                   if($items['start_date'] != ''){
                    $status = true;
                }else{
                     $status  = 0;
                    $error_name = "Start Date is not found"; 
                }
                }

                  if($status){
                   if($items['end_date'] != ''){
                    $status = true;
                }else{
                     $status  = 0;
                    $error_name = "End Date is not found"; 
                }
                }

                if($status){
                   if($items['gst'] != ''){
                    $taxgst = tax_gst::where('tax_gst',$items['gst'])->first();
                    if($taxgst != ''){
                    $status = true;
                  }else{
                    $status = 0;
                     $error_name = "Gst Tax  Rate Not found in database";
                  }
                }else{
                     $status  = 0;
                     $error_name = "Gst Tax  Rate Not found in database"; 
                }
                }else{
                   $taxgst = tax_gst::where('tax_gst',$items['gst'])->first();
                }

                if($status){
                  if($items['tds'] != ''){
                    $tdstax = TaxTdsmodel::where('tds_tax',$items['tds'])->first();
                    if($tdstax != ''){
                    $status = true;
                  }else{
                    $status = 0;
                     $error_name = "Tax Tds  Rate Not found in database";
                  }
                }else{
                     $status  = 0;
                     $error_name = "Tax Tds  Rate Not found in database"; 
                }
                }else{
                  $tdstax = TaxTdsmodel::where('tds_tax',$items['tds'])->first();
                }

                if($status){
                  if($items['sd'] != ''){
                    $status = true;
                }else{
                     $status  = 0;
                     $error_name = "Sd Rate Required"; 
                }

                }

                 if($status){
                  if($items['location'] != ''){
                    $status = true;
                }else{
                     $status  = 0;
                     $error_name = "Location no filled"; 
                }
                }

                 if($status){
                  if($items['other'] != ''){
                    $status = true;
                }else{
                     $status  = 0;
                     $error_name = "Other no filled"; 
                }
                }

                 if($status){
                  if($items['client'] != ''){
                   $client = Client::where('name',$items['client'])->first();
                    if($client != ''){
                    $status = true;
                  }else{
                    $status = 0;
                    $error_name = "This Recevier is not fount in database";
                  }
                }else{
                     $status  = 0;
                     $error_name = "This Recevier is not fount in database"; 
                }

                }else{
                   $client = Client::where('name',$items['client'])->first();
                }


                if($status){
                  if($items['state_gstin'] != ''){
                  $e_gstin = Gstin::where('gstin',$items['state_gstin'])->first();
                    if($e_gstin != ''){
                    $status = true;
                  }else{
                    $status = 0;
                    $error_name = "This State gstin is not matched in database";

                  }
                }else{
                     $status  = 0;
                     $error_name = "This State gstin is not matched in database";
               
                }

                }else{

                   $e_gstin = Gstin::where('gstin',$items['state_gstin'])->first();
                }


                if($status){
                  if($items['client_gstin'] != ''){
                  $r_gstin = Client::where('gstin',$items['client_gstin'])->where('name',$items['client'])->first();
                    if($r_gstin != ''){
                    $status = true;
                  }else{
                    $status = 0;
                    $error_name = "This Recevier gstin is not matched in database";
                    $company = "";

                  }
                }else{
                     $status  = 0;
                     $error_name = "This Recevier gstin is not matched in database";
               
                }

                }else{

                   $r_gstin = Client::where('gstin',$items['client_gstin'])->where('name',$items['client'])->first();
                }

                if($status){
                  if($items['company']){
                     $company = Company_mast::where('name',$items['company'])->first();
                    if($company != ''){
                    $status = true;
                  }else{
                    $status = 0;
                    $error_name = "Company Name not found in database";
                  }
                }else{
                     $status  = 0;
                     $error_name = "Company Name not found in database";
                }

                }else{

                   $company = Company_mast::where('name',$items['company'])->first();

                }
               

               if($status){
                 $last_id  = DB::table('acco_job_master')->max('id');
                 $add= $last_id+1;

                      $array = array(
              'job_describe' => $items['jobwork_name'],
              'job_code' => "JWN-000-".$add,
              'tender_no' => $items['tender_no'],
              'tax_gst' => $taxgst->id,
              'tax_tds' => $tdstax->id,
              'sd_percentage' => $items['sd'],
              'place_of_supply' => $items['location'],
              'e_commerece_gstin' => $e_gstin->id,
              'other' => $items['other'],
              'client_id' =>$client->id,
              'comp_id' => $company->id,
              'tender_value' => $items['tendor_value'],
              'tender_rate' => $items['tendor_rate'],
              'work_order_no' => $items['work_order_no'],
              'work_value' => $items['work_value'],
              'work_s_data' => Date::excelToDateTimeObject($items['start_date'])->format('Y-m-d'),
              'Work_end_date' => Date::excelToDateTimeObject($items['end_date'])->format('Y-m-d'),
                );
              job_master::create($array);

               }else{
               $errors[] = array(
              'name' => $items['jobwork_name'],
              //'job_code' => $items['job_code'],
              'tender_no' => $items['tender_no'],
              'taxgst' => ($taxgst == '') ? 'This tax GST  not matched' : $taxgst->tax_gst,
              'taxtds' => ($tdstax == '') ? 'This tax TDS  not matched' : $tdstax->tds_tax,
              'sd_percentage' => $items['sd'],
              'correspondence_address' => $items['location'],
              'e_commerece_gstin' => ($e_gstin == '') ? 'This e-commerece-gstin  not matched' : $e_gstin->gstin,
              'other' => $items['other'],
              'receiver_name' => $items['client'],
              'recevier_gstin' =>  ($r_gstin == '') ? 'This client gstin not matched' : $r_gstin->gstin,
              'client_id' => ($client == '') ? 'This client not found' : $client->name,
              'comp_id' => ($company == '') ? 'This company not found' : $company->name,
              'tender_value' => $items['tendor_value'],
              'tender_rate' => $items['tendor_rate'],
              'work_order_no' => $items['work_order_no'],
              'work_value' => $items['work_value'],
              'work_s_data' => Date::excelToDateTimeObject($items['start_date'])->format('Y-m-d'),
              'Work_end_date' => Date::excelToDateTimeObject($items['end_date'])->format('Y-m-d'),
              'error_filed' => $error_name,

             );
             }
        }   
         }
          if(count($errors) !=0){
            return Excel::download(new cjobExport($errors), 'client_job_error_sheet.xlsx');
        }else{
           return redirect()->route('job-list');
        }
    }


    public function clientjobformat(){

       $path = storage_path('client_job_sheet..xls');
    return Response::download($path);
    }


     public function getclientassignwork(Request $request){

           $job =  job_master::where('client_id',$request->id)->where('comp_id',$request->cid)->get();
             return view("Master.job_search_table",compact('job'));
    }
}

