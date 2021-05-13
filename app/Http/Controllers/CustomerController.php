<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\City;
use  App\Customers;

class CustomerController extends Controller
{
    

    public function index(){
        $cust= Customers::paginate(10);
    	return view('Customer.customer-list',compact('cust'));
    }

    public  function create(){
   
       return view('Customer.customer-add');    	
    }

    public  function  getcity(Request $request){

    	  $state_code=$request->id;
        $city=City::select('*')->where('state_code',$state_code)->get();
        
        return $city;
    }

    public  function store(Request $request){

           $data = $request->validate([   
          'customer_desc'=>'required|min:2|max:30',      
          'address'=>'required',        
          'state'=>'required',          
          'postal_code'=>'required',          
          'contact1'=>'required|min:2|max:12',          
          'contact2'=>'required|min:6|max:12',                 
          'email'=>'required|email',          
          'designation'=>'required|min:2|max:30',          
          'notes'=>'required',          
          'gstin'=>'required|min:2|max:30',          
          'pan_number'=>'required|min:2|max:30',          
          'vat'=>'required',                    
          'district'=>'required',          
          ]);
        $data['cust_code'] = "cc-".substr(bin2hex(random_bytes(8)),0, 8);
        Customers::create($data);
        return redirect('customer-list');
    } 

    public function edit($id){
          $edit = Customers::find($id);
    	return view('Customer.customer-edit',compact('edit'));
    }

    public function update(Request $request,$id){

    	$data = $request->validate([   
          'customer_desc'=>'required|min:2|max:30',      
          'address'=>'required',        
          'state'=>'required',          
          'postal_code'=>'required',          
          'contact1'=>'required|min:2|max:12',          
          'contact2'=>'required|min:6|max:12',                 
          'email'=>'required|email',          
          'designation'=>'required|min:2|max:30',          
          'notes'=>'required',          
          'gstin'=>'required|min:2|max:30',          
          'pan_number'=>'required|min:2|max:30',          
          'vat'=>'required',                    
          'district'=>'required',          
          ]);

    	   Customers::where('id',$id)->update($data);
    	   return redirect('customer-list');

          
    }
}
