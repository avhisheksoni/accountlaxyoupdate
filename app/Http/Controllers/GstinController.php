<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gstin;

class GstinController extends Controller
{
    
    public function index(){
         
         $gstin = Gstin::paginate(10);
         return view('Gstin.index',compact('gstin'));

    }

    public function create(){

    	return view('Gstin.create');
    }

    public function store(Request $request){
         
    	$data = $request->validate([   
          'gstin'=>'required|max:15|min:15|unique:acco_gstin',          
          ]);
        Gstin::create($data);
        return redirect('gstin-list');
    }

    public function edit($id){

        $edit = Gstin::find($id);
        return view('Gstin.edit',compact('edit'));
    }

    public function update(Request $request, $id){

    	$data = $request->validate([   
          'gstin'=>'required|max:15|min:15|unique:acco_gstin,gstin,'.$id,          
          ]);
    	//dd($data);
        Gstin::where('id',$id)->update($data);
        return redirect('gstin-list');
    }

    public function delete($id){

      $dservice = Gstin::where('id', $id)->delete();
        return redirect()->back()->with('message','Gstin Is Successfully Removed From List');
    }

}
