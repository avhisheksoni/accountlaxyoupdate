<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PurchaseClient;
use App\PassignClient;
use App\PJobMast;
use App\Company_mast;
use App\job_categorgy;
use App\Imports\PJobImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PjobExport;
use App\Gstin;
use App\tax_gst;
use App\TaxTdsmodel;
use App\vendor_mast;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Illuminate\Support\Facades\DB;
use Response;

class PJobMastController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {    
         $Pcl  = PJobMast::get();
        return view('PJobMast.index',compact('Pcl'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {    
        $Pclient = vendor_mast::where('vendor_type','2')->get();
         return view('PJobMast.create',compact('Pclient'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
      $catcode = job_categorgy::find($request->cat_id)->name;
      $clecode = vendor_mast::where('vendor_type','2')->where('id',$request->client_id)->first()->firm_name;
      $unJob_id = strtoupper(substr($catcode,0,3).substr($clecode,0,4));
        $last_id  = DB::table('acco_p_job_mast')->max('id');
        //dd($last_id);
        $add= $last_id+1;
        $data = $request->validate([  
          'name'=>'nullable',                           
          'tender_no'=>'nullable',                           
          'location'=>'nullable',                           
          'tax_gst'=>'nullable|numeric',                           
          'tax_tds'=>'nullable|numeric',                           
          'sd_percentage'=>'nullable|numeric',                           
          'place_of_supply'=>'nullable',                           
          'client_id'=>'nullable',                           
          'comp_id'=>'nullable',                           
          'e_commerece_gstin'=>'nullable',                  
          'tender_value'=>'nullable',                  
          'tender_rate'=>'nullable',                  
          'work_order_no'=>'nullable',                  
          'work_value'=>'nullable',                  
          'work_s_data'=>'nullable',
          'Work_end_date'=>'nullable',
          'cat_id'=>'nullable',
          ]);
        $data['job_code'] = $unJob_id.$add; 
        PJobMast::create($data);
        return redirect('PJobMast')->with('message','Petty-job/work-name Added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $edit = PJobMast::find($id);
        return view('PJobMast.details',compact('edit'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = PJobMast::find($id);
        return view('PJobMast.edit',compact('edit'));
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
       $data = $request->validate([  
          'name'=>'nullable',                           
          'tender_no'=>'nullable',                           
          'location'=>'nullable',                           
          'tax_gst'=>'nullable|numeric',                           
          'tax_tds'=>'nullable|numeric',                           
          'sd_percentage'=>'nullable|numeric',                           
          'place_of_supply'=>'nullable',                           
          'client_id'=>'nullable',                           
          'comp_id'=>'nullable',                           
          'e_commerece_gstin'=>'nullable',
          'tender_value'=>'nullable',                  
          'tender_rate'=>'nullable',                  
          'work_order_no'=>'nullable',                  
          'work_value'=>'nullable',                  
          'work_s_data'=>'nullable',
          'Work_end_date'=>'nullable',
          'cat_id'=>'nullable',                  
          ]);
        PJobMast::where('id',$id)->update($data);
        return redirect('PJobMast')->with('message','Petty-job/work-name Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dservice = PJobMast::where('id', $id)->delete();
      return redirect()->back()->with('message','P-Client Is Successfully Removed From List');

    }

    public function getPclientgstin(Request $request){
      
      $data['Pgsin']= vendor_mast::find($request->id);
      $data['Pac']= PassignClient::with(['company'=>function($query){
        $query->select('name','id');

      }])->where('client_id',$request->id)->select('id','comp_id','client_id')->get();

      return $data;

    }

    public function purchasework(Request $request){
       
       return PJobMast::where('comp_id',$request->cid)->where('client_id',$request->id)->get();

    }

    public function getpreceiver(Request $request){

      $data = PJobMast::find($request->id);
      $data['gstin'] = Gstin::find($data->e_commerece_gstin);
      $data['gst'] = tax_gst::find($data->tax_gst);
      $data['tds'] = TaxTdsmodel::find($data->tax_tds);
      $data['client'] = vendor_mast::find($data->client_id);
      $data['cat_id'] = job_categorgy::find($data->cat_id);

      return $data;
    }


    public function pjovexcel(Request $request){
           
        $datas = Excel::toCollection(new PJobImport,request()->file('excel_data'));
          
          
             $errors= array();
             $error_name = '';
         foreach($datas  as  $data){
          foreach($data as $items){
            
            $status = true;

            if($status){
              if($items['jobwork_name'] != ''){
                   $status = true;
              }else{
                $status = 0;
                $error_name = "job /Workname  Name is Empty";
              }
            }
              
              if($status){

              if($items['tender_no'] != ''){
                   $status = true;
              }else{
                $status = 0;
                $error_name = "Tender No. Name is Empty";
              }

              }

              if($status){

              if($items['tendor_value'] != ''){
                if(is_numeric($items['tendor_value'])){
                   $status = true;

                 }else{
                  $status = 0;
                  $error_name = "Tender value Should be Numeric";
                 }
              }else{
                $status = 0;
                $error_name = "Tender value  is Empty";
              }

              }

              if($status){

              if($items['tendor_rate'] != ''){
                   $status = true;
              }else{
                $status = 0;
                $error_name = "Tender No. Name is Empty";
              }

              }

              if($status){

              if($items['work_order_no'] != ''){
                   $status = true;
              }else{
                $status = 0;
                $error_name = "Work order No. is Empty";
              }

              }

                if($status){

              if($items['work_value'] != ''){
                if(is_numeric($items['work_value'])){
                   $status = true;

                 }else{
                  $status = 0;
                  $error_name = "Work value Should be Numeric";
                 }
              }else{
                $status = 0;
                $error_name = "Work value  is Empty";
              }

              }

               if($status){

              if($items['start_date'] != ''){
                   $status = true;
              }else{
                $status = 0;
                $error_name = "Start Date is Empty";
              }

              }

               if($status){

              if($items['end_date'] != ''){
                   $status = true;
              }else{
                $status = 0;
                $error_name = "End Date is Empty";
              }

              }
             
              if($status){
                if($items['location'] != ''){
                  $status = true;
                }else{

                $status = 0;
                $error_name = "Site location  is Empty";
                }
              }
              // else{
              //   $status = 0;
              //   $error_name = "Site location  is Empty";
              // }

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
                  if($items['other'] != ''){
                    $status = true;
                }else{
                     $status  = 0;
                     $error_name = "Other no filled"; 
                }
                }
           
                if($status){
                  if($items['petty_contractor'] != ''){
                   $client = vendor_mast::where('vendor_type',2)->where('firm_name',$items['petty_contractor'])->first();
                    if($client != ''){
                    $status = true;
                  }else{
                    $status = true;
                    
                  }
                }else{
                     $status  = 0;
                     $error_name = "This Petty Contractor is not fount in database"; 
                }

                }else{
                   $client = vendor_mast::where('vendor_type',2)->where('firm_name',$items['petty_contractor'])->first();
                }

                 if($status){
                  if($items['petty_contractor_gstin'] != ''){
                  $r_gstin = vendor_mast::where('vendor_type',2)->where('gst_number',$items['petty_contractor_gstin'])->where('firm_name',$items['petty_contractor'])->first();
                    if($r_gstin != ''){
                    $status = true;
                  }else{
                   $status = true;

                  }
                }else{
                     $status  = 0;
                     $error_name = "This Petty Contractor gstin is not matched in database";
               
                }

                }else{

                   $r_gstin = vendor_mast::where('vendor_type',2)->where('gst_number',$items['petty_contractor_gstin'])->where('firm_name',$items['petty_contractor'])->first();
                }

                // return $error_name."-".$status;

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

//return $error_name."--".$status;

              if($status){
                 $last_id  = DB::table('acco_p_job_mast')->max('id');
                 $add= $last_id+1;

                      $array = array(
              'name' => $items['jobwork_name'],
              'job_code' => "PJWN-000-".$add,
              'tender_no' => $items['tender_no'],
              'tax_gst' => $taxgst->id,
              'tax_tds' => $tdstax->id,
              'sd_percentage' => $items['sd'],
              'place_of_supply' => $items['location'],
              'location' => $items['location'],
              'receiver_name' => $items['petty_contractor'],
              'e_commerece_gstin' => $e_gstin->id,
              'other' => $items['other'],
              'client_id' =>($client == '') ? '0' : $client->id,
              'comp_id' => $company->id,
              'tender_value' => $items['tendor_value'],
              'tender_rate' => $items['tendor_rate'],
              'work_order_no' => $items['work_order_no'],
              'work_value' => $items['work_value'],
              'petty_contractor' => $items['petty_contractor'],
              'pc_gstin' => $items['petty_contractor_gstin'],
              'work_s_data' => Date::excelToDateTimeObject($items['start_date'])->format('Y-m-d'),
              'Work_end_date' => Date::excelToDateTimeObject($items['end_date'])->format('Y-m-d'),
                );
                // dd($array);     
              PJobMast::create($array);

               }else{
               $errors[] = array(
              'name' => $items['jobwork_name'],
              'tender_no' => $items['tender_no'],
              'taxgst' => ($taxgst == '') ? 'This tax GST  not matched' : $taxgst->tax_gst,
              'taxtds' => ($tdstax == '') ? 'This tax TDS  not matched' : $tdstax->tds_tax,
              'sd_percentage' => $items['sd'],
              // 'correspondence_address' => $items['location'],
              'location' => $items['location'],
              'receiver_name' => $items['petty_contractor'],
              'recevier_gstin' =>  ($client == '') ? 'This client gstin not matched' : $client->gst_number,
              'other' => $items['other'],
              'client_id' => ($client == '') ? 'This client not found' : $client->name,
              'comp_id' => ($company == '') ? 'This company not found' : $company->name,
              'e_commerece_gstin' => ($e_gstin == '') ? 'This e-commerece-gstin  not matched' : $e_gstin->gstin,
              'tender_value' => $items['tendor_value'],
              'tender_rate' => $items['tendor_rate'],
              'work_order_no' => $items['work_order_no'],
              'work_value' => $items['work_value'],
              // 'petty_contractor' => $items['petty_contractor'],
              // 'pc_gstin' => $items['petty_contractor_gstin'],
              'work_s_data' => Date::excelToDateTimeObject($items['start_date'])->format('Y-m-d'),
              'Work_end_date' =>  Date::excelToDateTimeObject($items['end_date'])->format('Y-m-d'),
              'error_filed' => $error_name,

             );
             }
      }
    }

    if(count($errors) !=0){
            return Excel::download(new PjobExport($errors), 'Purchasecompany_job_error_sheet.xlsx');
        }else{
           return redirect()->route('PJobMast.index');
        }
  }

  public function pettyjobformat(){
     //return "ewtwwet";
    $path = storage_path('petty-job-format..xls');
    return Response::download($path);
  }

  public function getpettycompany(Request $request){
     
      return PassignClient::with(['petty'=>function($query){
            $query->select('id','name','firm_name');
          }])->where('comp_id',$request->id)->select('comp_id','client_id','id')->get();

  }

  public function getperrtyassignwork(Request $request){
      // return "gryeye";
     $Pcl = PJobMast::where('client_id',$request->id)->where('comp_id',$request->cid)->get();

       return view('PJobMast.petty_search_table',compact('Pcl'));
  }

}
