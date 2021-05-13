<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use Session;
use App\EmpMast;

class HomeController extends Controller
{
    
    public function index()
    {
        if(Auth::check()){
          $user  = EmpMast::where('user_id', Auth::id())->first();
          Session::put('avatar', $user->emp_avatar);
            return view('home');            
        }
        else{
             return redirect('http://laxyo.org/login');
        }
    }

    public function loginuser($username,$pass){

        $data = User::where('email',$username)->first();  
        if($username !='' && $pass !=''){
            if($data->log_status == true && $data->enc_password == $pass){
          if (Auth::attempt(['email' => $username, 'password' =>$data->other_pass])) {
        // dd($data);   
               $user = Auth::user();
              return redirect()->route('home');
            }else {
               return response()->json(['error' => 'Unauthorised'], 401);
            }
          }
          else{
            return redirect('http://laxyo.org/login');
          }
        }
        else{
            return response()->json(['error' => 'Unauthorised'], 401);
        }
    }

    public function logout(Request $request){
        Auth::logout();
        Session::flush();
        return redirect('http://laxyo.org/login');
    }

    public function test(){
        return 'sdfsdf';
        return redirect('http://laxyo.org');
    }

}
