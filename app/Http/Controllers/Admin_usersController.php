<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Admin_users;

class Admin_usersController extends Controller
{
     public function getlist()
     {
          $data = Admin_users::paginate(10);
          return view('back-end.admins_mem.list', ['data' => $data]);
     }

     public function getadd(){
          return view('back-end.admins_mem.add');
          
     }

     public function postadd(Request $request){
          $this->validate($request,[
               'name' => 'required|min:3|max:255',
               'email' => 'required|email|unique:admin_users',
               'username' => 'required|unique:admin_users',
               'password' => 'required|min:3|max:32',
               'confirm_password' => 'required|same:password',
          ],[
               'name.required' => 'Hãy nhập vào họ tên của bạn',
               'name.max' => 'Họ tên tối đa 255 ký tự',
               'email.required' => 'Hãy nhập vào địa chỉ Email',
               'email.email' => 'Địa chỉ Email không đúng định dạng',
               'email.unique' => 'Địa chỉ Email đã tồn tại',
               'username.unique' => 'UserName đã tồn tại',
               'password.required' => 'Hãy nhập mật khẩu',
               'password.min' => 'Mật khẩu tối thiểu 3 ký tự',
               'confirm_password.same' => 'Xác nhận mật khẩu sai'
          ]);
          $data = new Admin_users();
          $data->name = $request->name;
          $data->username = $request->username;
          $data->email = $request->email;
          $data->password = bcrypt($request->password);
          $data->level = "Quản lý";
          $data->save();

          return redirect()->route('getmem')->with(['massage'=>' Đã thêm thành công !']);
     }

     public function getedit($id){
          $data = Admin_users::find($id);
          return view('back-end.admins_mem.edit',['data' => $data]);
     }

     public function postedit($id,Request $request){
          $this->validate($request,[
               'name' => 'required|min:3|max:255',
               'email' => 'required|email|unique:admin_users',
          ],[
               'name.required' => 'Hãy nhập vào họ tên của bạn',
               'name.max' => 'Họ tên tối đa 255 ký tự',
               'email.required' => 'Hãy nhập vào địa chỉ Email',
               'email.email' => 'Địa chỉ Email không đúng định dạng',
               'email.unique' => 'Địa chỉ Email đã tồn tại',
          ]);
          $data = Admin_users::find($id);
          $data->name = $request->name;
          $data->email = $request->email;
          $data->level = "Quản lý";

          if($request->changePassword == "on")
          {
               $this->validate($request,[
                    'password' => 'required|min:3|max:32',
                    'confirm_password' => 'required|same:password',
               ],[
                    'password.required' => 'Hãy nhập mật khẩu',
                    'password.min' => 'Mật khẩu tối thiểu 3 ký tự',
                    'confirm_password.same' => 'Xác nhận mật khẩu sai'
               ]);

               $data->password = bcrypt($request->password); 
          }

          $data->save();

          return redirect()->route('geteditmen',$id)->with(['massage'=>' Đã sửa thành công !']);
     }

     public function getdel($id){
          $data = Admin_users::find($id);
          $data -> delete();
          return redirect()->route('getlstmen')->with(['massage'=>' Đã xóa thành công !']);
     }

     public function search(Request $request){
          $search = $request->search;
          $data = Admin_users::where('username', 'like', '%'.$search.'%')
          ->Orwhere('email','like', '%'.$search.'%')->paginate(10);
          return view('back-end.admins_mem.search',['data'=>$data]);
     }
}
