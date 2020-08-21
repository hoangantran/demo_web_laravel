<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Oders;
use App\Oders_detail;
use Auth;
use App\Products;
use App\Category;
use App\User;
use DB;

class OdersController extends Controller
{
    ///////////////////////ADMIN/////////////////////////////////////
    public function getlist()
    {
        $data = Oders::orderBy('created_at', 'desc')->paginate(10);
    	return view('back-end.oders.list',['data'=>$data]);
    }

    public function getdetail($id)
    {
    	$oder = Oders::where('id',$id)->first();
    	$data = DB::table('oders_detail')
    			 	->join('products', 'products.id', '=', 'oders_detail.pro_id')
    			 	->groupBy('oders_detail.id')
    			 	->where('o_id',$id)
                    ->get();
                    //dd($oder);
    	return view('back-end.oders.detail',['data'=>$data,'oder'=>$oder]);
	}
	
    public function postoder($id)
    {
    	$oder = Oders::find($id)->update(['status'=> 1]);
    	return redirect('admin/donhang')
      	->with(['massage'=>' Đã xác nhận đơn hàng thành công !']);    	

	}
	
    public function getdel($id)
    {       
    	$oder = Oders::where('id',$id)->first();
    	if ($oder->status != 0) {
    		return redirect()->back()
    		->with(['massage'=>'Không thể hủy đơn hàng số: '.$id.' vì đã được xác nhận!']);
    	} else {
    		$oder = Oders::find($id)->update(['status'=> -1]);
        	return redirect('admin/donhang')
         	->with(['massage'=>'Đã hủy đơn hàng số:  '.$id.' !']);
     	}
    }
    ////////////////////////User////////////////////////////////////

    public function orderslist()
    {
        $user = User::find(Auth::user()->id);
        $u_id = $user->id;
        $data = DB::table('oders')
                        ->where([
                        ['u_id',$u_id],            
                        ])->get();  

       
        return view('front-end.detail.orders-list',['data'=>$data,'user'=>$user]);
    }

    public function orderdetail(Request $request)
    {
        $u_id = Auth::user()->id;
        $o_id = $request->code;
        $oder = Oders::where([['id',$o_id],['u_id',$u_id]])->first();
        $data = DB::table('products')
                    ->join('oders_detail', 'products.id', '=', 'oders_detail.pro_id')
                    ->join('category', 'category.id', '=' , 'products.cat_id')
                    ->select('products.name','products.slug','products.id as pro_id','products.images','products.price','Oders_detail.*','category.slug as cat_slug')
                    ->where('o_id',$o_id)
                    ->get();
        return view('front-end.detail.order-detail',['data'=>$data,'order'=>$oder]);
    }
}
