<?php

namespace App\Http\Controllers;

use DB;
use Helper;
use App\vendor;
use App\item;
use App\GST_State_Code;
use App\Brand;
use App\item_category;
use App\vendor_type;
use App\firm_type;
use App\vendor_mast;
use App\state;
use App\City;
use App\Imports\VendorImport;
use App\Exports\VendorErrExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Response;

class VendorController extends Controller
{
    
    public function index()
    {    
      
        $vendors = vendor_mast::all();
        // dd($vendors);
        return view('vendor.index',compact('vendors'));
    }

   
    public function create()
    {  
    	$vype = vendor_type::all();
        $fype = firm_type::all();
        return view('vendor.create', compact('vype','fype'));
    }

    public function store(Request $request)
    {
            
            $data = $request->validate([
                'vendor_type' => 'required',
                'firm_type' => 'required',
                'firm_name' => 'required|',
                'email' => 'nullable',
                'mobile' => 'nullable|digits_between:10,10',
                'address' => 'nullable',
                'city' => 'nullable',
                'postal_code' => 'nullable',
                'state_code' => 'nullable',
                'city_code' => 'nullable',
                'name' => 'nullable',
                'phone' => 'nullable|numeric',
                'fax' => 'nullable|numeric',
                'website' => 'nullable',
                'pan_no' => 'nullable|unique:acco_vendor_mast',
                'aadhar_no' => 'nullable',
                'gst_number' => 'nullable|unique:acco_vendor_mast',
                'annual_turnover' => 'nullable',
                'reference_name1' => 'nullable',
                'reference_name2' => 'nullable',
                'bank_name' => 'nullable',
                'branch_address' => 'nullable',
                'account_no' => 'nullable',
                'ifsc_code' => 'nullable',
            ]);
           
         vendor_mast::create($data);
        return redirect()->route('vendor.index')->with('success','Vendor Added successfully.');
    }

    public function show(Request $request,$id)
    {
    		
        $edit  = vendor_mast::find($id);
        return view('vendor.details',compact('edit'));
    }

    public function edit(Request $request ,$id)
    { 
        
        $edit  = vendor_mast::find($id);
        return view('vendor.edit',compact('edit'));
    }

    public function update(Request $request, $id)
    {
       $update = $request->validate([
                'vendor_type' => 'required',
                'firm_type' => 'required',
                'firm_name' => 'required|',
                'email' => 'nullable',
                'mobile' => 'nullable|digits_between:10,10',
                'address' => 'nullable',
                'city' => 'nullable',
                'postal_code' => 'nullable',
                'state_code' => 'nullable',
                'city_code' => 'nullable',
                'name' => 'nullable',
                'phone' => 'nullable|numeric',
                'fax' => 'nullable|numeric',
                'website' => 'nullable',
                'pan_no' => 'nullable|unique:acco_vendor_mast,pan_no,'.$id,
                'aadhar_no' => 'nullable',
                'gst_number' => 'nullable|unique:acco_vendor_mast,gst_number,'.$id,
                'annual_turnover' => 'nullable',
                'reference_name1' => 'nullable',
                'reference_name2' => 'nullable',
                'bank_name' => 'required',
                'branch_address' => 'required',
                'account_no' => 'required',
                'ifsc_code' => 'required',
            ]); 
            
            vendor_mast::where('id',$id)->update($update);
        return redirect()->route('vendor.index')->with('success','Vendors details updated successfully');
    }

    public function vendorformat(){
        //return "wwwwyw";
        $path = storage_path('vendor_format (1).xls');
        return Response::download($path);
    }

    public function vendorexcel(Request $request){
      
        $datas = Excel::toCollection(new VendorImport,request()->file('excel_data'));
          

          
         $errors= array();
         $error_name = '';
        foreach($datas as $data){
            foreach($data as $item){
                //dd($item);
            $status = true;

            if($status){
              if(!preg_match("/^([0-2][0-9]|[3][0-7])[A-Z]{3}[ABCFGHLJPTK][A-Z]\d{4}[A-Z][A-Z0-9][Z][A-Z0-9]$/", $item['gstin'])) {        
                $error_name = "NoT valid gstin"; 
                $status = 0;

                }else {  
                $status =  true;
                }
              }
      //return $error_name."".$status;
            if($status){
              if(!preg_match("/^([a-zA-Z]){5}([0-9]){4}([a-zA-Z]){1}?$/", $item['pan_no'])) {        
                $error_name = "NoT valid Pan No."; 
                $status = 0;

                }else {  
                $status =  true;
                }
              }

               if($status){
              if(!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $item['email'])) {        
                $error_name = "NoT valid Email address"; 
                $status = 0;

                }else {  
                $status =  true;
                }
              }

               if($status){
              if(!preg_match("/^[0-9]{10}+$/", $item['mobile'])) {        
                $error_name = "NoT valid Mobile No."; 
                $status = 0;

                }else {  
                $status =  true;
                }
              }
            
               if($status){
                    if($item['state']){
                       $state = state::where('state_name',$item['state'])->first();
                       if($state != ''){
                       $status = true;
                     }else{
                      $status = 0;
                      $error_name = "State Name Does not Exit in databases";
                      $state = state::where('state_name',$item['state'])->first();
                     }
                    }else{
                      $status = 0;
                      $error_name = "State Name Does not Exit in databases";
                      $state = state::where('state_name',$item['state'])->first();
                    }
                }else{
                      $status = 0;
                      $error_name_for = "some field is field unfilled";
                       $state = state::where('state_name',$item['state'])->first();
                }

                //  if($status){
                //     if($item['district']){
                //       $city = City::where('city_name',$item['district'])->first();
                //        if($city != ''){
                //        $status = true;
                //      }else{
                //       $status = 0;
                //       $error_name = "City Name Does not Exit in databases";
                //       $city = City::where('city_name',$item['district'])->first();
                //      }
                //     }else{
                //       $status = 0;
                //       $error_name = "City Name Does not Exit in databases";
                //       $city = City::where('city_name',$item['district'])->first();
                //     }
                // }
                // else{
                //       $status = 0;
                //       $error_name2 = "some field is field unfilled";
                //       $city = City::where('city_name',$item['district'])->first();
                // }

                //return $item['district'] ;

            if($status){
              if($item['vendor_type']) {        
                $vtype = vendor_type::where('name',$item['vendor_type'])->first();
                if($vtype){
                   $status = true;
                }else{
                 $status = true;
                 //$error_name = "Vendor Type not Exit in databases";
                 $vtype = vendor_type::where('name',$item['vendor_type'])->first();
                }
                }
            }else{
                $status = 0;
                $error_name2 = "some field is field unfilled";
                $vtype = vendor_type::where('name',$item['vendor_type'])->first();
            }

            if($status){
              if($item['firm_type']) {        
                $ftype = firm_type::where('name',$item['firm_type'])->first();
                if($ftype){
                   $status = true;
                }else{
                 $status = true;
                 //$error_name = "Firm Type not Exit in databases";
                 $ftype = firm_type::where('name',$item['firm_type'])->first();
                }
                }
            }else{
                $status = 0;
                $error_name2 = "some field is field unfilled";
                $ftype = firm_type::where('name',$item['firm_type'])->first();
            }

             if($status){
              if($item['firm_name']) {        
                  $status =  true;
                }else {  
                 $error_name = "Firm Name Field is Empty"; 
                 $status = 0;
                }
              }

              if($status){
              if($item['firm_name']) {        
                  $status =  true;
                }else {  
                 $error_name = "Firm Name Field is Empty"; 
                 $status = 0;
                }
              }

               if($status){
              if($item['address']) {        
                  $status =  true;
                }else {  
                 $error_name = " Address Field is Empty"; 
                 $status = 0;
                }
              }

               if($status){
              if($item['city']) {        
                  $status =  true;
                }else {  
                 $error_name = " City Field is Empty"; 
                 $status = 0;
                }
              }

               if($status){
              if($item['postal_code']) {        
                  $status =  true;
                }else {  
                 $error_name = " Postal Code Field is Empty"; 
                 $status = 0;
                }
              }

              // if($status){
              // if($item['name']) {        
              //     $status =  true;
              //   }else {  
              //    $error_name = "Name Field is Empty"; 
              //    $status = 0;
              //   }
              // }

              // if($status){
              // if($item['aadhar_no']) {        
              //     $status =  true;
              //   }else {  
              //    $error_name = "Aadhar No. Field is Empty"; 
              //    $status = 0;
              //   }
              // }

               if($status){
              if($item['bank']) {        
                  $status =  true;
                }else {  
                 $error_name = "Bank Name Field is Empty"; 
                 $status = 0;
                }
              }

                if($status){
              if($item['bank_branch']) {        
                  $status =  true;
                }else {  
                 $error_name = "Bank Branch Field is Empty"; 
                 $status = 0;
                }
              }

               if($status){
              if($item['account_no']) {        
                  $status =  true;
                }else {  
                 $error_name = "Account No. Field is Empty"; 
                 $status = 0;
                }
              }

                if($status){
              if($item['ifsc_code']) {        
                  $status =  true;
                }else {  
                 $error_name = "IFSC Code Field is Empty"; 
                 $status = 0;
                }
              }


             

              //dd($vtype->id);
                 if($status){
             $array = array(
              'vendor_type' =>($vtype == '') ? '0' : $vtype->id,
              'firm_type' => ($ftype == '') ? '0' : $ftype->id,
              'email' => $item['email'],
              'mobile' => $item['mobile'],
              'state_code' => ($state == '') ? 'state  not found' : $state->state_code,
              //'city_code' => ($city == '') ? 'city  not found' : $city->city_code,
              'address' => $item['address'],
              'city' => $item['city'],
              'postal_code' => $item['postal_code'],
              'name' => $item['name'],
              'phone' => $item['phone'],
              'pan_no' => $item['pan_no'],
              'aadhar_no' => $item['aadhar_no'],
              'gst_number' => $item['gstin'],
              'reference_name1' => $item['reference_name'],
              'firm_name' => $item['firm_name'],
              'vendor_type_imp' => $item['vendor_type'],
              'firm_type_imp' => $item['firm_type'],
              'bank_name' => $item['bank'],
              'branch_address' => $item['bank_branch'],
              'account_no' => $item['account_no'],
              'ifsc_code' => $item['ifsc_code'],
               );
             // dd($array);

                 vendor_mast::create($array);
                 }else{

                      $errors[] = array(
              'vendor_type' => $item['vendor_type'],
              'firm_type' => $item['firm_type'],
              'email' => $item['email'],
              'mobile' => $item['mobile'],
              'state_code' => ($state == '') ? 'state not found' : $state->state_name,
              //'city_code' => ($city == '' ) ? 'city not found' : $city->city_name,
              'address' => $item['address'],
              'city' => $item['city'],
              'postal_code' => $item['postal_code'],
              'name' => $item['name'],
              'phone' => $item['phone'],
              'pan_no' => $item['pan_no'],
              'aadhar_no' => $item['aadhar_no'],
              'gst_number' => $item['gstin'],
              'reference_name1' => $item['reference_name'],
              'firm_name' => $item['firm_name'],
              'vendor_type_imp' => $item['vendor_type'],
              'firm_type_imp' => $item['firm_type'],
              'bank_name' => $item['bank'],
              'branch_address' => $item['bank_branch'],
              'account_no' => $item['account_no'],
              'ifsc_code' => $item['ifsc_code'],
              'error_field' => $error_name,

             );
                 }



        }}

        if(count($errors) !=0){
            return Excel::download(new VendorErrExport($errors), 'Vendor_data_error_sheet.xlsx');

        }else{
          
           return redirect()->route('vendor.index');
        }

    }


}
