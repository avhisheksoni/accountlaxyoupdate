<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TaxTdsmodel;

class TaxTdsController extends Controller
{
    public function index(){
     
     $tds = TaxTdsmodel::paginate();
     return view('TdsTax.index',compact('tds'));

    }

    public function create(){

    	return view('TdsTax.create');
    }

    public function store(Request $request){
       
        $data= $request->validate([
    		'tds_tax'=>'required|unique:acco_re_tds_tax',
    		]);

     	  TaxTdsmodel::create($data);
        return redirect('tds-list');

    }

    public function edit($id){
            
        $edit=  TaxTdsmodel::find($id);
        return view('TdsTax.edit',compact('edit'));   
    }

    public function update(Request $request,$id){

    	 $data= $request->validate([
    		'tds_tax'=>'required|unique:re_tds_tax,tds_tax,'.$id,
    		]);

     	  TaxTdsmodel::where('id',$id)->update($data);
        return redirect('tds-list');
    }

    public function delete($id){

    	$dservice = TaxTdsmodel::where('id', $id)->delete();
        return redirect()->back()->with('message','Tax Tds Is Successfully Removed From List');
    }
}
