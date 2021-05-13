<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\role_user;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Role;


class UserRoleController extends Controller
{
    
    public function index($id){

      
      $roleuser = Role::all();
      $roles = role_user::where('user_id',$id)->get();
      $roleId = [];
      foreach($roles as $role){
        $roleId[] = $role->role_id;
      }

        $username=DB::table('users')->select('*')->where('id',$id)->first();
    	return view('admin.user-role-view',compact('roleId','roleuser','username'));
    }

    public function roleadd($id){

      $user= DB::table('users')->select('*')->where('id',$id)->first();
      $roles=DB::table('roles')->select('*')->get();
      $roleuser=DB::table('role_user')->select('*')->where('user_id',$id)->get();
      //dd($roleuser);
      return view('admin.user-role-add',compact('user','roles','roleuser'));
    }


    public function store(Request $request, $id)
  {

    $user = User::findOrFail($id);
    $user->syncRoles($request->role);

    return redirect()->back();
  }
     
      
    
}
