<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CompanyPartyModel;
use App\Company_mast;

class CompanyPartyController extends Controller
{
    
    public function index(){
        
        $Party = CompanyPartyModel::paginate(10);
    	return view('Company-Party.index',compact('Party'));
    }

    public function create(){
        $cmp = Company_mast::all();
    	return view('Company-Party.create',compact('cmp'));
    }

    public function store(Request $request){

    	 $data = $request->validate([   
          'company_id'=>'required',      
          'company_party'=>'required',   
          'code_gen'=>'required',   
          'party_code'=>'required',   
          ]);
        CompanyPartyModel::create($data);
        return redirect('company-party-list'); 
    }

    public function edit($id){
      

      $edit = CompanyPartyModel::find($id);
      return view('Company-Party.edit',compact('edit'));

    }

    public function details($id){
          
           $edit = CompanyPartyModel::find($id);
           return view('Company-Party.details',compact('edit'));

    }

    public function update(Request $request,$id){

      $data = $request->validate([   
          'company_id'=>'required',      
          'company_party'=>'required',
          'code_gen'=>'required',   
          'party_code'=>'required',   
          ]);
        CompanyPartyModel::where('id',$id)->update($data);
        return redirect('company-party-list'); 
    }

    public  function  getparty(Request $request){
       
       $cmp_id =  $request->cmp_id;
        $cmp=CompanyPartyModel::select('*')->where('company_id',$cmp_id)->get();
        
        return $cmp;
    }


    public function delete($id){

        $dservice = CompanyPartyModel::where('id', $id)->delete();
      return redirect()->back()->with('message','Party  Is Successfully Removed From List');
    }
}
