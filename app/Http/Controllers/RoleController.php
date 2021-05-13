<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;

class RoleController extends Controller
{
     public function index(){
        
        $role= Role::paginate(10);
    	return view('admin.rolelist',compact('role'));
    }

    public function create(){
       
      return view('admin.role-create');

    } 
    public function store(Request $request){

    	 $data= $request->validate([
    		'name'=>'required|min:2|max:30',
    		'display_name'=>'required',
    		'description'=>'nullable',


    ]);
     	  Role::create($data);
        return redirect('rolelist');
    	
   }

    public function edit($id){

       $edit= Role::find($id);
       return view('admin.roleedit',compact('edit'));
    }

    public function update(Request $request,$id){

    	$data= $request->validate([
    		'name'=>'required|min:2|max:30',
    		'display_name'=>'required',
    		'description'=>'nullable',


    ]);
     	  Role::where('id',$id)->update($data);
     	  return redirect('rolelist')->with('message','Role Is Successfully Update');
       } 

       public function delete($id){

       	$dservice = Role::where('id', $id)->delete();
      return redirect()->back()->with('message','Role  Is Successfully Removed');
   }
       
}
