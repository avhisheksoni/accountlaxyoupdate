<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tax_gst;

class TaxGstController extends Controller
{
    
    public function index(){
        $tax = tax_gst::paginate();
    	return view('TaxGst.index',compact('tax'));
    }

    public function create(){


         return view('TaxGst.create');
    	
    }

    public function store(Request $request){

    	 $data= $request->validate([
    		'tax_gst'=>'required|unique:acco_re_tax_gst',
    		]);

     	  tax_gst::create($data);
        return redirect('tax-list');
    }

    public function edit($id){

    	$edit = tax_gst::find($id);
    	return view('TaxGst.edit',compact('edit'));
    }

    public function update(Request $request,$id){

    	$data= $request->validate([
    		'tax_gst'=>'required|unique:re_tax_gst,tax_gst,'.$id,
    		]);

     	  tax_gst::find($id)->update($data);
        return redirect('tax-list');
    }

    public function delete($id){
   
	  $dservice = tax_gst::where('id', $id)->delete();
      return redirect()->back()->with('message','Tax gst Is Successfully Removed From List');

    }
}
