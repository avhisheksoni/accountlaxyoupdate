<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    

    public function index(){
       

       $user=User::paginate(10);
       //dd($user);
    	return view('admin.userlist',compact('user'));
    }

    public function create(){

    	return view('admin.user-create');
    }

    public function store(Request $request){

    	$data= $request->validate([
            'name'=>'required|min:2|max:30',
            'email'=>'required|email',
            'password'=>'required',


    ]);
          $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);
        return redirect('userlist');
    }

    public function edit($id){

       $edit= User::find($id);
       return view('admin.user-edit',compact('edit'));
    }

    public function update(Request $request,$id){

        $data= $request->validate([
            'name'=>'required|min:2|max:30',
            'email'=>'required',


    ]);
          User::where('id',$id)->update($data);
          return redirect('userlist')->with('message','User Is Successfully Update');
       } 

       public function delete($id){

        $dservice = User::where('id', $id)->delete();
      return redirect()->back()->with('message','User Is Successfully Removed');
   }
}
