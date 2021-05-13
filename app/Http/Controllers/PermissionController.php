<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permission;

class PermissionController extends Controller
{
    public function index(){

        $permission=Permission::paginate(10);
    	return view('admin.permissionlist',compact('permission'));
    }

    public function create(){

    	return view('admin.permission-create');
    }

    public function store(Request $request){

    	 $data= $request->validate([
    		'name'=>'required|min:2|max:30',
    		'display_name'=>'required',
    		'description'=>'nullable',


    ]);
     	  Permission::create($data);
        return redirect('permissionlist');
    }

    public function edit($id){

       $edit= Permission::find($id);
       return view('admin.permission-edit',compact('edit'));
    }

    public function update(Request $request,$id){

    	$data= $request->validate([
    		'name'=>'required|min:2|max:30',
    		'display_name'=>'required',
    		'description'=>'nullable',


    ]);
     	  Permission::where('id',$id)->update($data);
     	  return redirect('permissionlist')->with('message','Permission Is Successfully Update');
       } 


       public function delete($id){

       	$dservice = Permission::where('id', $id)->delete();
      return redirect()->back()->with('message','Permission  Is Successfully Removed');
   }
}
