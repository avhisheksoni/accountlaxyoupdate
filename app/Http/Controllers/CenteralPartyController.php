<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CentralParty;
use App\Company_mast;
use App\CompanyPartyModel;


class CenteralPartyController extends Controller
{
    
    public function index(){
        
        $Party = CentralParty::paginate(10);
    	return view('Central-Party.index',compact('Party'));
    }

    public function create(){

    	return view('Central-Party.create');
    }

    public function store(Request $request){
         //dd($request->all());
    	$data = $request->validate([   
          'party_name'=>'required',      
          'company_id'=>'required',
          'pan_no'=>'required|max:10|min:10',          
          'contact'=>'required|min:10|numeric',          
          'city_code'=>'required',                        
          'state_code'=>'required',          
          'postal_address'=>'required', 
          'party_id'=>'required',            
          'note'=>'required',           
          ]);
        //dd($data);
        $un_code = CompanyPartyModel::find($request->party_id);
        $up = intval($un_code->code_gen)+1;
        $data['sub_party_code'] = $un_code->code_gen;
        CentralParty::create($data);
        $update['code_gen'] = $up;
        CompanyPartyModel::where('id',$request->party_id)->update($update);
        return redirect('central-party-list');
    }

    public function edit($id){

       $edit = CentralParty::find($id);
       return view('Central-Party.edit',compact('edit'));

    }

    public function update(Request $request,$id){
      
     $data = $request->validate([   
          'party_name'=>'required',      
          'company_id'=>'required',
          'pan_no'=>'required|max:10|min:10',          
          'contact'=>'required|min:10|numeric',          
          'city_code'=>'required',                        
          'state_code'=>'required',          
          'postal_address'=>'required', 
          'party_id'=>'required',            
          'note'=>'required',             
          ]);
        //dd($data);
        CentralParty::where('id',$id)->update($data);
        return redirect('central-party-list');


    }

    public function details($id){
     
     $edit = CentralParty::find($id);
     return view('Central-Party.details',compact('edit'));

    }

    public function delete($id){
      
      $dservice = CentralParty::where('id', $id)->delete();
      return redirect()->back()->with('message','Central Party Is Successfully Removed From List');

    }
}
