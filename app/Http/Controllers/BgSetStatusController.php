<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\bg_set_status;

class BgSetStatusController extends Controller
{
    

    public function index(){
        
        $bg = bg_set_status::paginate(10);
    	return view('BG.index',compact('bg'));
    }

    public function create(){

    	return view('BG.create');
    }

    public function store(Request $request){
     
    	$data = $request->validate([   
          'name'=>'required', 

      ]);
     //dd($data);
         bg_set_status::create($data);
    	 return redirect('bg-status');
    }

    public function edit($id){

        $edit = bg_set_status::find($id);
    	return view('BG.edit',compact('edit'));
    }

    public function update(Request $request,$id){
       
        $data = $request->validate([   
          'name'=>'required', 

      ]);
         bg_set_status::where('id',$id)->update($data);
    	 return redirect('bg-status');
    }

    public function delete($id){

      $dservice = bg_set_status::where('id', $id)->delete();
      return redirect()->back()->with('message','Bg type  Is Successfully Removed From List');
    }
}
