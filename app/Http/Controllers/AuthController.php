<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use validate;
use Validator;
use DB;


class AuthController extends Controller
{
    //
  public function showloginform()
  {
    return view('front-end.auth.login');
  }

  public function checkusername(Request $request)
  {
    $username = $request->username;
    if($username != ''){
      $data = DB::table('users')->where('username', $username)->first();
      if($data){
        return '<p style="color: red"><b>Username này đã được sử dụng!</b></p>';
      }
      return '';
    }
  }

  public function checkemail(Request $request)
  {
    $email = $request->email;
    if($email != ''){
      $data = DB::table('users')->where('email', $email)->first();
      if($data){
        return '<p style="color: red"><b>&ensp; Email này đã được sử dụng!</b></p>';
      }
      return '';
    }
  }

  public function login(Request $request)
  {
        $arr = [
            'username' => $request->Username, 
            'password' => $request->Password
        ];

        if(Auth::attempt($arr))
        {
            return redirect()->route('getindex');
        }else{
            return view('front-end.auth.login',['error'=>'Username hoặc Password không chính xác!']);
        }
  }

  public function register(Request $request)
  {       
    DB::table('users')->insert(
    [
        'name' => $request->name,
        'email' => $request->email,
        'username' => $request->username,
        'password' => bcrypt($request->password),
        'phone' => $request->phone,
        'address' => $request->address
    ]);
    return view('front-end.auth.login',['message'=>'Đăng Ký Thành Công!']);  
  }

  public function userinformation()
  {
    $user = User::find(Auth::user()->id);
    return view('front-end.member.information',['user'=>$user]);
  }

  public function updateInformation(Request $request)
  {
    $id = $request->id;   
    $user = User::find($id);
    $user->name = $request->name;
    $user->email = $request->email;
    $user->address = $request->address;
    $user->phone = $request->phone;
   
    $user->save();
    return back();
  }

  public function logout()
  {
    Auth::logout();
    return redirect()->route('getindex');
  }

}
