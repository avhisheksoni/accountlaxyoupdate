<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company_mast;
use Illuminate\Support\Facades\DB;

class CompanyController extends Controller
{
    
    public function index(){

        $cmp = Company_mast::paginate(10);
    	return view('Company.index',compact('cmp'));
    }

    public function create(){

    	return view('Company.create');
    }

    public function store(Request $request){

    	 $last_id  = DB::table('acco_company_mast')->max('id');
    	 $add= $last_id+1;
      $data = $request->validate([  
          'name'=>'required',                                                
          ]);
        $data['code'] = "LEL-".$add;
        //dd($data); 
        Company_mast::create($data);
    	return redirect()->route('company-list');
    }


    public function edit($id){
           
        $edit = Company_mast::find($id);
        return view('Company.edit',compact('edit'));
    }

    public function update(Request $request,$id){
        
         $data = $request->validate([  
          'name'=>'required',
          'code'=>'required',                                                
          ]);
        Company_mast::where('id',$id)->update($data);
    	return redirect()->route('company-list'); 
    	
    }

    public function details($id){

    	$edit = Company_mast::find($id);
        return view('Company.details',compact('edit'));
    }

    public function delete($id){

    	 $dservice = Company_mast::where('id', $id)->delete();
      return redirect()->back()->with('message','Company code  Is Successfully Removed From List');
    }
}
