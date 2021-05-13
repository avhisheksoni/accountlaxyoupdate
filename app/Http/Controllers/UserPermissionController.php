<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permission;
use Illuminate\Support\Facades\DB;
use App\Permission_user;
use App\User;

class UserPermissionController extends Controller
{
    

    public function index($id){

    	$permissionuser = Permission::all();
      $permission = Permission_user::where('user_id',$id)->get();
      $permissionId = [];
      foreach($permission as $have_p){
        $permissionId[] = $have_p->permission_id;
      }

        $username=DB::table('users')->select('*')->where('id',$id)->first();
    	return view('admin.user-permission-view',compact('permissionId','permissionuser','username'));
    }


    public function store(Request $request, $id){

    	$user = User::findOrFail($id);
		$user->syncPermissions($request->permissions);

		return redirect()->back();
    } 
}
