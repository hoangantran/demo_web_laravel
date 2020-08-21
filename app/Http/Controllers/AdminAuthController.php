<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin_users;
use Auth;
use Validator;

class AdminAuthController extends Controller
{
   public function showloginform()
   {
       return view('back-end.login');
   }

   public function login(Request $request)
   {
        $arr = [
            'username' => $request->Username, 
            'password' => $request->Password
        ];

        if(Auth::guard('admin')->attempt($arr))
        {
            return view('back-end.home', ['admin'=>Auth::guard('admin')->user()]);
        }else{
            return view('back-end.login',['error'=>'UserName hoặc Password sai']);
        }
   }

   public function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('adlogin');
   }
}
