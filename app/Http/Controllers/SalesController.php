<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\sales;
use App\job_master;
use App\Gstin;
use App\tax_gst;
use App\TaxTdsmodel;
use App\Client;
use App\Company_mast;
use App\salechq;
use App\job_categorgy;
use App\AssignClient;
use App\Imports\saleexcleImport;
use App\Exports\salesexport;
use App\Exports\sbillExport;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Response;

class SalesController extends Controller
{
   

   public function index(){

      $job = job_master::all();
     return view('pages.salesform',compact('job'));	
   } 

   public function store(Request $request){
    //dd($request->all());
   	 $data= $request->validate([
    		'job_id'=>'required',
        'invoive_number'=>'required',
        'sales_date'=>'required|date',
        'gross_total_invoice_value'=>'required|numeric',
        'invoice_type'=>'required',
        'base_amount_taxable_value'=>'required|numeric',
        'description'=>'required',
        //'cheque_date'=>'required|date',
        //'cheque_received_amount'=>'required|numeric',         
        'tds_amount'=>'nullable',
       // 'other'=>'nullable',
        //'total_amount'=>'required|numeric',
        'outstanding'=>'nullable|numeric',
        'five_percrnt_sd_amount'=>'nullable',
        'gst_amount'=>'nullable|numeric',
        'mobilize_amount'=>'nullable|numeric',
        'retent_amount'=>'nullable|numeric',
        'other_deduct_amount'=>'nullable|numeric',
        'total_deduct_amount'=>'nullable|numeric',
        'gst_hold'=>'nullable|numeric',
        'balance_to_be_billed'=>'nullable|numeric',
        'amount_to_be_received'=>'nullable|numeric',
        'comp_id'=>'required|numeric',
        'tds_on_gst_2per'=>'nullable|numeric',
        'lab_cess_1per'=>'nullable|numeric',
        'hold_for_royalty'=>'nullable|numeric',
        'deb_late_submission_on_car_151day'=>'nullable|numeric',
        'electricity'=>'nullable|numeric',
        'rent'=>'nullable|numeric',
        'other2'=>'nullable|numeric',
        'bill_desc'=>'required',
        'taxable_value'=>'required',
        'bill_imposed_on'=>'required',


    	]);
     //dd($data);
     if($request->hasFile('bill_img')){
          $data['bill_img'] = storage::putfile('public/salesbill',$request->file('bill_img'));;
      }
     	  $user = sales::create($data);
        $lastId= $user->id;
    $array = $request->cheque_date_;
    $amount = $request->cheque_received_amount_;
    $sum = 0;
    for($count=0; $count<count($array);$count++){
       $cdate['sale_id'] = $lastId;
       $cdate['cheque_date'] = $array[$count];
       $cdate['cheque_amount'] = $amount[$count];
       $sum = $sum+$amount[$count];

       salechq::create($cdate);
    }
     $datack['cheque_date']=$cdate['cheque_date'];
    $up['cheque_received_amount'] = $sum;
    sales::where('id', $lastId)->increment('total_ck_rec', $sum);
    sales::where('id', $lastId)->update($datack);
//     Product::where('product_id', $product->id)
// ->increment('count', 1, ['last_count_increased_at' => Carbon::now()]);
    
    
        return redirect('salelist');
    	
   }

   public function salelist(){
   $saleslist = sales::orderBy('sales_date', 'DESC')->get();;
    //dd(sales::with('job')->get());
     //dd($posts);
   	$sum['sum'] = sales::sum('gross_total_invoice_value');
     $sum['bamount'] = sales::sum('base_amount_taxable_value');
     $sum['cra'] = sales::sum('total_ck_rec');
     $sum['usd'] = sales::sum('outstanding');
     $sum['gst'] = sales::sum('gst_amount');
   // /return sales::with('job')->get();
     // dd($posts);
    return view('pages.saleslist',compact('saleslist','sum'));  	
   }

   public function saledetails($id){
    $edit = sales::where('id',$id)->first();
    $ckamt = sales::find($id)->checkamount;
    return view('pages.salesdetails',compact('edit','ckamt'));
   }

   public  function saleedit($id){
   
   $edit = sales::where('id',$id)->first();
   //return $edit->job;
   $ckamt = sales::find($id)->checkamount;
   $count = count($ckamt);
   //dd($comments);
   return view('pages.salesedit',compact('edit','ckamt','count'));  

   }

   public function salesupdate(Request $request ,$id){
  
    // $client= $request->validate([
    //         'client_id' => 'required',
    //      ]);

    //      $update = job_master::where('id',$request->job_id)->update($client);
         
         $data= $request->validate([
        //'job_id'=>'required',
        'invoive_number'=>'required',
        'sales_date'=>'required|date',
        'gross_total_invoice_value'=>'required|numeric',
        'invoice_type'=>'required',
        'base_amount_taxable_value'=>'required|numeric',
        'description'=>'required',
        //'cheque_date'=>'required|date',
        //'cheque_received_amount'=>'required|numeric',
        'tds_amount'=>'nullable',
       // 'other'=>'nullable',
        //'total_amount'=>'required|numeric',
        'outstanding'=>'nullable|numeric',
        'five_percrnt_sd_amount'=>'nullable',
        'gst_amount'=>'nullable|numeric',
        'mobilize_amount'=>'nullable|numeric',
        'retent_amount'=>'nullable|numeric',
        'other_deduct_amount'=>'nullable|numeric',
        'total_deduct_amount'=>'nullable|numeric',
        'gst_hold'=>'nullable|numeric',
        'balance_to_be_billed'=>'nullable|numeric',
        'amount_to_be_received'=>'nullable|numeric',
        //'comp_id'=>'required|numeric',
        'tds_on_gst_2per'=>'nullable|numeric',
        'lab_cess_1per'=>'nullable|numeric',
        'hold_for_royalty'=>'nullable|numeric',
        'deb_late_submission_on_car_151day'=>'nullable|numeric',
        'electricity'=>'nullable|numeric',
        'rent'=>'nullable|numeric',
        'other2'=>'nullable|numeric',
        'bill_desc'=>'required',
        'bill_imposed_on'=>'nullable',


      ]);

         //dd($request->cheque_date_);
         if($request->hasFile('bill_img')){
          $data['bill_img'] = storage::putfile('public/salesbill',$request->file('bill_img'));
        }
      
        sales::where('id', $id)->update($data);
        $lastId = $request->sale_id;
        //dd($lastId);
         // $highlights[] = "3435";
         // return @$highlights[4];
        $array = $request->cheque_date_;
        $amount = $request->cheque_received_amount_;
        $ckamtid = $request->ckamtid;
        $cheque_received_amount = $request->cheque_received_amount_;
        $sum = 0;
        // dd((count($array)));
        $idss = array();
        $ides = array();
    for($count=0; $count< count($array);$count++){
       //@$highlights[4] ? $highlights[4] : '',
      //dd(@$ckamtid[$count]);
       $udate['sale_id'] = $lastId;
       $udate['cheque_date'] = $array[$count];
       $udate['cheque_amount'] = $amount[$count];
       $sum = $sum+$amount[$count];
       // if($ckamtid[$count]){
       //dd($udate);
       // salechq::where('id', @$ckamtid[$count])->where('sale_id',$lastId)->delete();
       // salechq::create($udate);
     // }else{
     //  salechq::create($udate);
     // }

       if(@$ckamtid[$count]){
          salechq::where('id', @$ckamtid[$count])->where('sale_id',$lastId)->update($udate);

       }else{
          salechq::create($udate);
       }
       //return $idss;
      
      
    }
   // return $ides;
    $total_a['total_ck_rec'] = $sum;
    sales::where('id', $id)->update($total_a);
    return redirect('salelist')->with('message','Sales Details  Is Successfully Update');

   }

   public function saledelete($id){

    $dservice = sales::where('id', $id)->delete();
      return redirect()->back()->with('message','Sales Details  Is Successfully Removed From List');
   }

   public function download_pdf($id){
      //return "tete";
      $filename = sales::where('id', $id)->first()->bill_img;
      $storage_path = storage_path($filename);
       Response::download($path);

        $headers = array(
    'Content-Disposition' => 'inline',
);

return Storage::download($storage_path, $filename, $headers);
   }

  public function receiver(Request $request){
     
      $data = job_master::find($request->id);
      $data['gstn'] = Gstin::find($data->e_commerece_gstin);
      $data['gst'] = tax_gst::find($data->tax_gst);
      $data['tds'] = TaxTdsmodel::find($data->tax_tds);
      $data['client'] = Client::find($data->client_id);
      $data['comp'] = Company_mast::find($data->comp_id);
      $data['jobcat'] = job_categorgy::find($data->job_cat_id);
      return $data;

   }

    public function compwisejob(Request $request){
     
     return job_master::with(['client'=>function($query){
          $query->select('name','id');
     }])->where('comp_id',$request->id)->select('id','client_id','job_code')->get();



     // = DB::table('job_master')
     //        ->join('re_client', 're_client.id', '=', 'job_master.client_id')
     //        ->where('job_master.comp_id',$request->id)
     //        ->select('re_client.name','job_master.id')
     //        ->get();

    // return job_master::with(['client'])->where('')

   }

    public function searchdata(Request $request){

     return $request->id;
   }

   public function deleterow(Request $request){
       //return $request->id;
       $delet_a = salechq::find($request->id);
       sales::where('id', $delet_a->sale_id)->increment('outstanding', $delet_a->cheque_amount);
      
        return salechq::where('id',$request->id)->delete();
   }


   public function salesheetimport(Request $request){
      
        $datas = Excel::toCollection(new saleexcleImport,request()->file('excel_data'));
           //dd($datas);

             $status = true;
             $errors= array();
             $error_name = '';
             $workid = '';
        foreach($datas as $sales){
          foreach($sales as $items){
         //dd($items);
           if($items['our_company'] == null && $items['gstinuin_of_recipient'] == null && $items['client_name'] == null && $items['invoice_number'] == null && $items['payment_date'] != '' && $items['payment_received_amount'] != ''){
                    $last_id  = sales::max('id');
                    $pay_sec['sale_id'] = $last_id;
                    $pay_sec['cheque_date'] = Date::excelToDateTimeObject($items['payment_date'])->format('Y-m-d');
                    $pay_sec['cheque_amount'] = intval($items['payment_received_amount']);
                    $date['cheque_date'] = Date::excelToDateTimeObject($items['payment_date'])->format('Y-m-d');
                    //$date['payment_status'] = "multi_pay";
                     salechq::create($pay_sec);
                     sales::where('id', $last_id)->increment('total_ck_rec', $pay_sec['cheque_amount']);
                     sales::where('id', $last_id)->update($date);
           }




             $status = true;
            if($status){
             if($items['our_company'] != ''){
             // return  $items['our_company'];
                $comp = Company_mast::where('name',$items['our_company'])->first();
                $status =  true;
             }else{
                $error_name = "Our Company is not filled"; 
                $status = 0;
             }


            }

            if($status){
             if($items['work_name'] != ''){
                $status =  true;
             }else{
                $error_name = "Work Name is not filled"; 
                $status = 0;
             }


            }

              
            // if($status){
            //  if($items['payment_status'] == 'once' || $items['payment_status'] == 'other'){
            //     $status =  true;
            //  }else{
            //     $error_name = "This is not Error Entry was compeleted"; 
            //     $status = 0;
            //  }


            // }


            if($status){
              if(!preg_match("/^([0-2][0-9]|[3][0-7])[A-Z]{3}[ABCFGHLJPTK][A-Z]\d{4}[A-Z][A-Z0-9][Z][A-Z0-9]$/", $items['gstinuin_of_recipient'])) {        
                $error_name = "NoT valid gstin"; 
                $status = 0;

                }else {  
                $status =  true;
                }
              }

              if($status){
                 if($items['client_name'] != ''){
                  $rec_id = Client::where('name',$items['client_name'])->where('gstin',$items['gstinuin_of_recipient'])->first();
                   if($rec_id){
                      $status =  true;
                       $receiver =  $rec_id->id;
                   }else{

                    $data['name'] = $items['client_name'];
                    $data['gstin'] = $items['gstinuin_of_recipient'];
                    $lastid = Client::create($data);
                     $receiver =  $lastid->id;
                   }

                 }else{
                    $error_name = "Client Name van't be Empty"; 
                    $status = 0;
                    $receiver =  null;

                 }

              }

              if($status){
              // $items['work_site'];
               if($items['work_site'] != ''){
                   $job_id = job_master::where('job_describe',$items['work_site'])->where('comp_id',$comp->id)->where('client_id',$receiver)->first();

                 if($job_id){
                       $workid   = $job_id->id;
                       $status = true;

                 }else{
                        $last_id  = job_master::max('id');
                        $add= $last_id+1;
                        $gst = tax_gst::where('tax_gst',$items['gst_rate'])->first();
                        $tds = TaxTdsmodel::where('tds_tax',$items['tds_rate'])->first();
                        $comp = Company_mast::where('name',$items['our_company'])->first();
                        $work['job_describe'] = $items['work_site'];
                        $work['place_of_supply'] = $items['place_of_supply'];
                        $work['tax_gst'] = $gst->id;
                        $work['tax_tds'] = $tds->id;
                        $work['sd_percentage'] = $items['sd_at_5'];
                        $work['e_commerece_gstin'] = 1;
                        $work['comp_id'] = $comp->id;
                        $work['client_id'] = $receiver;
                        $work['job_code'] = "JWN-000-".$add;
                        // return $work;
                        $job  = job_master::create($work);
                        $workid= $job->id;
                        $status =  true;
                 }

               }else{

                    $error_name = "Work name  is Empty"; 
                    $status = 0;
                    //$workid= null;
               }

              }
//return $error_name."".$status."-".$workid;
              if($status){
                if($items['invoice_number'] != '' ){
                   $ststus = true;
                }else{
                    $error_name = "Invoice Number is Empty"; 
                    $status = 0;
                }
              }

              if($status){
                if($items['invoice_date'] != ''){
                   $ststus = true;
                }else{
                    $error_name = "Invoice Date is Empty"; 
                    $status = true;
                }
              }

              if($status){
                if($items['gross_total_invoice_value'] != '' && is_numeric($items['gross_total_invoice_value'])){
                   $status = true;
                }else{
                    $error_name = "Gross Total either Empty or non-integer"; 
                    $status = 0;
                }
              }

              if($status){
                if($items['invoice_type'] != ''){
                   $status = true;
                }else{
                    $error_name = "Invoice Type is Empty"; 
                    $status = 0;
                }
              }

              if($status){
                if($items['e_commerce_gstin'] != ''){
                   $status = true;
                }else{
                    $error_name = "E-comm Gstin is Empty"; 
                    $status = 0;
                }
              }

              if($status){
                if($items['gst_rate'] != ''){
                 $gstid = tax_gst::where('tax_gst',$items['gst_rate'])->first();
                 $status = true;
                }else{
                    $error_name = "Gst Rate %  is Empty"; 
                    $status = 0;
                }
              }

              if($status){
                if($items['tds_rate'] != '' && is_numeric($items['base_amount_taxable_value'])){
                 $tdsid = TaxTdsmodel::where('tds_tax',$items['tds_rate'])->first();
                 $status = true;
                }else{
                    $error_name = "TDS Rate %  is Empty"; 
                    $status = true;
                    $tdsid= 0;
                }
              }

               if($status){
                if($items['base_amount_taxable_value'] != '' && is_numeric($items['base_amount_taxable_value'])){
                   $status = true;
                }else{
                    $error_name = "Basse Amount Taxable either Empty or non-integer"; 
                    $status = 0;
                }
              }

               if($status){
                if($items['gst_amount'] != '' && is_numeric($items['gst_amount'])){
                   $status = true;
                }else{
                    $error_name = "GST Amount either Empty or non-integer"; 
                    $status = true;
                }
              }

              if($status){
                if($items['description'] != ''){
                   $status = true;
                }else{
                    $error_name = "Description can be Empty"; 
                    $status = 0;
                }
              }

              if($status){
                if($items['tds_amount'] != '' && is_numeric($items['tds_amount'])){
                   $status = true;
                }else{
                    $error_name = "TDS Amount either Empty or non-integer"; 
                    $status = true;
                }
              }
               
              // if($status){
              //   if($items['sd_at_5'] != ''  && is_numeric($items['sd_at_5'])){
              //      $status = true;
              //   }else{
              //       $error_name = "SD Amount either Empty or non-integer"; 
              //       $status = 0;
              //   }
              // }
              // //return $error_name."-".$status;

              // if($status){
              //   if($items['tds_on_gst_at_2'] != '' && is_numeric($items['tds_on_gst_at_2'])){
              //      $status = true;
              //   }else{
              //       $error_name = "TDS on Gst at 2% either Empty or non-integer"; 
              //       $status = 0;
              //   }
              // }

              // if($status){
              //   if($items['lab_cess_at_1'] != '' && is_numeric($items['lab_cess_at_1'])){
              //      $status = true;
              //   }else{
              //       $error_name = "LAB CESS At 1 either Empty or non-integer"; 
              //       $status = 0;
              //   }
              // }

              // if($status){
              //   if($items['hold_for_royalty'] != '' && is_numeric($items['hold_for_royalty'])){
              //      $status = true;
              //   }else{
              //       $error_name = "Hold For  Royalty either Empty or non-integer"; 
              //       $status = 0;
              //   }
              // }

              // if($status){
              //   if($items['ded_late_submission_car_151_days'] != '' && is_numeric($items['ded_late_submission_car_151_days'])){
              //      $status = true;
              //   }else{
              //       $error_name = "DeD Late Submission Car 151 Day either Empty or non-integer"; 
              //       $status = 0;
              //   }
              // }

              // if($status){
              //   if($items['mobolization_advance'] != '' && is_numeric($items['mobolization_advance'])){
              //      $status = true;
              //   }else{
              //       $error_name = "Mobolization Advance either Empty or non-integer"; 
              //       $status = 0;
              //   }
              // }

              //  if($status){
              //   if($items['rent'] != '' && is_numeric($items['rent'])){
              //      $status = true;
              //   }else{
              //       $error_name = "Rent Filled either Empty or non-integer"; 
              //       $status = 0;
              //   }
              // }

              // if($status){
              //   if($items['tds_on_igst_at_2'] != '' && is_numeric($items['tds_on_igst_at_2'])){
              //      $status = true;
              //   }else{
              //       $error_name = "TDS on IGST at 2  either Empty or non-integer"; 
              //       $status = 0;
              //   }
              // }

              //  if($status){
              //   if($items['cc_at_1'] != '' && is_numeric($items['cc_at_1'])){
              //      $status = true;
              //   }else{
              //       $error_name = "CC at 1  either Empty or non-integer"; 
              //       $status = 0;
              //   }
              // }

              //  if($status){
              //   if($items['others_foodeletricitypenaltydbwc_cgstsgst_1_grp_insurance_md_psd'] != '' && is_numeric($items['others_foodeletricitypenaltydbwc_cgstsgst_1_grp_insurance_md_psd'])){
              //      $status = true;
              //   }else{
              //       $error_name = "Other1 Filled either Empty or non-integer"; 
              //       $status = 0;
              //   }
              // }

              // if($status){
              //   if($items['other'] != '' && is_numeric($items['other'])){
              //      $status = true;
              //   }else{
              //       $error_name = "Other2 Filled either Empty or non-integer"; 
              //       $status = 0;
              //   }
              // }

               if($status){
                if($items['total'] != '' && is_numeric($items['total'])){
                   $status = true;
                }else{
                    $error_name = "Total  Filled either Empty or non-integer"; 
                    $status = true;
                }
              }

              if($status){
                if($items['outstanding'] != '' && is_numeric($items['outstanding'])){
                   $status = true;
                }else{
                    $error_name = "Outstanding  Filled either Empty or non-integer"; 
                    $status = true;
                }
              }

              //return  $error_name."-".$status;
              if($status){
             $array = array(
              'comp_id' => $comp->id,
              //'gstinuin_of_recipient' => $items['gstinuin_of_recipient'],
              'job_id' => $workid,
              'invoive_number' => $items['invoice_number'],
              'sales_date' => Date::excelToDateTimeObject($items['invoice_date'])->format('Y-m-d'),
              'gross_total_invoice_value' => $items['gross_total_invoice_value'],
              'invoice_type' => $items['invoice_type'],
              'e_commerce_gstin' => $items['e_commerce_gstin'],
              //'gst_rate' => $gstid->id,
              //'tds_rate' => $tdsid->id,
              'base_amount_taxable_value' => $items['base_amount_taxable_value'],
              'gst_amount' => $items['gst_amount'],
              'description' => $items['description'],
              // 'payment_date' => $
              // 'payment_received_amount' => $
              'tds_amount' => $items['tds_amount'],
              'five_percrnt_sd_amount' => $items['sd_at_5'],
              'tds_on_gst_2per' => $items['tds_on_gst_at_2'],
              'lab_cess_1per' => $items['lab_cess_at_1'],
              'hold_for_royalty' => $items['hold_for_royalty'],
              'deb_late_submission_on_car_151day' => $items['ded_late_submission_car_151_days'],
              'mobilize_amount' => $items['mobolization_advance'],
              'rent' => $items['rent'],
              'tds_on_igst_at_2' => $items['tds_on_igst_at_2'],
              'cc_at_1' => $items['cc_at_1'],
              'other2' => $items['others_foodeletricitypenaltydbwc_cgstsgst_1_grp_insurance_md_psd'],
              'other' => $items['other'],
              'total_amount' => $items['total'],
              'outstanding' => $items['outstanding'],
              'bill_desc' => $items['work_name']
               );
             //dd($array);

                 $last_id  = sales::create($array);
                 $pay['sale_id'] = $last_id->id;
                 $pay['cheque_date'] = Date::excelToDateTimeObject($items['payment_date'])->format('Y-m-d');
                 $pay['cheque_amount'] = intval($items['payment_received_amount']);
                 $date['cheque_date'] = Date::excelToDateTimeObject($items['payment_date'])->format('Y-m-d');
                 salechq::create($pay);
                 sales::where('id', $last_id->id)->increment('total_ck_rec', $pay['cheque_amount']);
                 sales::where('id', $last_id->id)->update($date);

                 }else{

                      $errors[] = array(
              'comp_id' => $items['our_company'],
              //'gstinuin_of_recipient' => $items['gstinuin_of_recipient'],
              'job_id' => $items['work_site'],
              'invoive_number' => $items['invoice_number'],
              'sales_date' => Date::excelToDateTimeObject($items['invoice_date'])->format('Y-m-d'),
              'gross_total_invoice_value' => $items['gross_total_invoice_value'],
              'invoice_type' => $items['invoice_type'],
              'e_commerce_gstin' => $items['e_commerce_gstin'],
              'gst_rate' => $items['gst_rate'],
              'tds_rate' => $items['tds_rate'],
              'base_amount_taxable_value' => $items['base_amount_taxable_value'],
              'gst_amount' => $items['gst_amount'],
              'description' => $items['description'],
              'payment_date' => Date::excelToDateTimeObject($items['payment_date'])->format('Y-m-d'),
              'payment_received_amount' => $items['payment_received_amount'],
              'tds_amount' => $items['tds_amount'],
              'five_percrnt_sd_amount' => $items['sd_at_5'],
              'tds_on_gst_2per' => $items['tds_on_gst_at_2'],
              'lab_cess_1per' => $items['lab_cess_at_1'],
              'hold_for_royalty' => $items['hold_for_royalty'],
              'deb_late_submission_on_car_151day' => $items['ded_late_submission_car_151_days'],
              'mobilize_amount' => $items['mobolization_advance'],
              'rent' => $items['rent'],
              'tds_on_igst_at_2' => $items['tds_on_igst_at_2'],
              'cc_at_1' => $items['cc_at_1'],
              'other2' => $items['others_foodeletricitypenaltydbwc_cgstsgst_1_grp_insurance_md_psd'],
              'other' => $items['other'],
              'total_amount' => $items['total'],
              'outstanding' => $items['outstanding'],
              'bill_desc' => $items['work_name'],
              'error_field' => $error_name,

             );
                 }
              }
             if(count($errors) !=0){
            return Excel::download(new sbillExport($errors), 'sale_bills.xlsx');

        }else{
          
            return redirect('salelist');
        } 
 }
}

   public function exportsalefilter(Request $request){
   
    $comp_id = $request->compid;
   //$rec_id = $request->re_id;
     $wor_id = $request->job;
   if($comp_id != '' && $wor_id == ''){
         $result = sales::where('comp_id',$comp_id)->get();
   }else if($comp_id != '' && $wor_id != '' ){
         $result = sales::where('job_id',$wor_id)->where('comp_id',$comp_id)->get();


   }
    
    $exceldata = array();
   foreach($result as $res){
    $exceldata[] = array(
      'Job Code' => $res->job->job_code,
      'Invoice No.' => $res->invoive_number,
      'Invoice Date' => $res->sales_date,
      'Description/Particular' => $res->description,
      'Base Amount Taxable Value' => $res->base_amount_taxable_value,
      'GST' =>$res->job->gst->tax_gst,
      'GST Amount' => $res->gst_amount,
      'GST Hold(if any)' => $res->gst_hold,
      'Gross Invoice Value' => $res->gross_total_invoice_value,
      'Payment Receipt Date' => $res->cheque_date,
      'Amount To be Received' => $res->amount_to_be_received,
      'Actual Paymnet Received' => $res->cheque_received_amount,
      'TDS% (1 or 2 or 5 or 10 %)' => $res->job->tds->tds_tax,
      'TDS Deduction Amount' => $res->tds_amount,
      'Mobilization Deduction Amount' => $res->mobilize_amount,
      'SD Amount (%)' =>$res->five_percrnt_sd_amount,
      'Retention Money' => $res->retent_amount,
      'Other Deduction 1' => $res->other_deduct_amount,
      'Total Deduction Amount' => $res->total_deduct_amount,
      'Current OutStanding' => $res->outstanding,
      'Total Order Value' => $res->job->work_value,
      'Balance To be Billed' => $res->balance_to_be_billed,
    );

}
     //$exceldata;

       return Excel::download(new salesexport($exceldata), 'Sales_reconcillation.xlsx');
   }


    
}
