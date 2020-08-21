<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use App\Category;
use App\Pro_detail;
use App\Oders;
use App\Oders_detail;
use Auth, DB, Cart, Datetime;


class PagesController extends Controller
{

    public function search(Request $request){
        $keyword = $request->value;
        $cat = Category::all();
        $pro = Products::where('name','like',"%$keyword%")->get();
        $count = $pro->count();
        return view('front-end.products.result',['cat'=>$cat, 'pro'=>$pro,'keyword'=>$keyword, 'count'=>$count]);
    }

    public function index()
    {
        $cat = Category::all();
        $pronew = DB::table('products')
                ->join('category', 'products.cat_id', '=', 'category.id')
                ->orderBy('created_at', 'desc')
                ->select('products.*','products.slug','category.slug as c_slug')
                ->paginate(6);
        
        return view('front-end.home', ['cat'=>$cat, 'pronew' => $pronew]);
    }

    public function getcate($id,$cat_slug)
    {
        $cat = Category::all();

        $cat1 =Category::where('id',$id)->first();
        
        if(empty($cat1)){
            //return view ('errors.404');
        }else{
            $name = $cat1->name;
            $pro = DB::table('products')
                ->join('category', 'products.cat_id', '=', 'category.id')
                ->where('cat_id','=',$cat1->id)
                ->select('products.*', 'products.slug', 'category.slug as c_slug')
                ->paginate(12);
            return view('front-end.category.cat',['cat'=>$cat, 'pro'=>$pro,'name_cat'=>$name ]);
        }
    }

    public function detail($cat_slug,$id,$slug)
    {
        $cat = Category::all();
        $cat1 = Category::where('slug', 'like', $cat_slug)->first();
        if(empty($cat1)){
            //return view ('errors.404');
        }else{
            $inf_pro = Products::where('cat_id',$cat1->id)->paginate(6);
            $pro = Products::where('id',$id)->first();
            return view('front-end.detail.pro-detail',['cat'=>$cat, 'pro'=>$pro, 'proinfo'=>$inf_pro]);
        }
    }

    public function getcart()
    {   
    	return view ('front-end.detail.cart');
    }

    public function addcart($id)
    {
        $pro = Products::where('id',$id)->first();
        Cart::add(['id' => $pro->id, 'name' => $pro->name, 'qty' => 1, 'price' => $pro->price,'weight' => 0,'options' => ['images' => $pro->images]]);
        return redirect()->route('getcart');
    }

    public function deletecart($id)
    {
        Cart::remove($id);
        return redirect()->route('getcart');
    }

    public function updatecart($id,$qty,$ac)
    {
        if($ac == 'up')
        {
            $qt = $qty+1;
            Cart::update($id, $qt);
            return redirect()->route('getcart');
        } elseif ($ac=='down') {
            $qt = $qty-1;
            Cart::update($id, $qt);
            return redirect()->route('getcart');
        } else {
            return redirect()->route('getcart');
        }
    }

    public function getoder()
    {
        if (Auth::guest()) {
            return redirect('login');
        } else {
            return view ('front-end.detail.oder');
        }        
    }

    public function postoder(Request $rq)
    {
        $oder = new Oders();
        $total =0;
        foreach (Cart::content() as $row) {
            $total = $total + ( $row->qty * $row->price);
        }
        $oder->u_id = Auth::user()->id;
        $oder->qty = Cart::count();
        $oder->total =  floatval($total);
        $oder->note = $rq->txtnote;
        $oder->status = 0;
        $oder->type = 'cod';
        $oder->created_at = new datetime;   
        $oder->save();
        $o_id =$oder->id;

        foreach (Cart::content() as $row) {
           $detail = new Oders_detail();
           $detail->pro_id = $row->id;
           $detail->qty = $row->qty;
           $detail->o_id = $o_id;
           $detail->created_at = new datetime;
           $detail->save();
        }
        Cart::destroy();   
        return redirect()->route('getcart')
        ->with(['massage'=>' Đơn hàng của bạn đã được gửi đi !']);    
        
    }

    public function getallproduct()
    {
        $cat = Category::all();
        $pro = Products::all();
        return view('front-end.products.allproduct',['cat'=>$cat, 'pro'=>$pro]);
    }

}
