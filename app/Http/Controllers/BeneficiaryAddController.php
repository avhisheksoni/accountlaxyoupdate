<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\beneficiary_add;

class BeneficiaryAddController extends Controller
{
    
    public function index(){

      $benef= beneficiary_add::orderBy('created_at', 'desc')->paginate(10);
    	return view('Benef-add.index',compact('benef'));
    }

    public function create(){

    	return view('Benef-add.create');
    }

    public function store(Request $request){
      // return $request->all();
    	$bg = explode("||",$request->client_id);
      $data = $request->validate([   
          'comp_id'=>'required',
          'bg_request_id'=>'required',
          ]);
       $data['client_id'] = $bg[0];
       
        beneficiary_add::create($data);
        return redirect('benef-list');
    }

    public function edit($id){

       $edit= beneficiary_add::find($id);
       return view('Benef-add.benef-edit',compact('edit'));
    }

    public function update(Request $request,$id){
        
        $bg = explode("||",$request->client_id);
        $data = $request->validate([   
          'comp_id'=>'required', 
          'bg_request_id'=>'required',       
          ]);
         $data['client_id'] = $bg[0];
        //dd($data);
        beneficiary_add::where('id',$id)->update($data);
        return redirect('benef-list')->with('message','Beneficiary  Is Successfully Updated');;
    }

    public function delete($id){

    	$dservice = beneficiary_add::where('id', $id)->delete();
      return redirect()->back()->with('message','Guarantee Request  Is Successfully Removed From List');
    }
      public function detail($id){
       
        $edit= beneficiary_add::find($id);
       return view('Benef-add.benef-detail',compact('edit'));
      }
  }
