<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use App\Category;
use App\Pro_details;
use Auth;
use DateTime,File,Input;

class ProductsController extends Controller
{

    
    public function getlist($id)
	{
        if ($id!='all') {
                $pro = Products::where('cat_id',$id)->paginate(10);
                $cat= Category::all();
                return view('back-end.products.pro-list',['data'=>$pro,'cat'=>$cat,'loai'=>$id]);                 
        } else {
            $pro = Products::paginate(10);
            $cat= Category::all();
            return view('back-end.products.pro-list',['data'=>$pro,'cat'=>$cat,'loai'=>0]);
        }		
    }
    
    public function getadd($id)
    {
        $loai = Category::where('id',$id)->first();
        $p_id = $loai->parent_id;
        if($p_id!=0)
        {
            $p_name = Category::where('id',$p_id)->first();
            $cat= Category::where('parent_id',$p_id)->get();
        }else{
            $p_name = $loai;
            $cat= Category::where('parent_id',$loai->id)->get();
        }	
        return view('back-end.products.add',['cat'=>$cat, 'loai'=>$p_name->name]);
    }

    public function postadd(Request $rq)
    {
    	$pro = new Products();

    	$pro->name = $rq->txtName;
    	$pro->slug = str_slug($rq->txtName,'-');
    	$pro->intro = $rq->txtIntro;
    	$pro->promo1 = $rq->txtPromo1;
    	$pro->promo2 = $rq->txtPromo2;
    	$pro->promo3 = $rq->txtPromo3;
    	$pro->review = $rq->txtReview;
    	$pro->price = $rq->txtPrice;
    	$pro->cat_id = $rq->sltCate;
    	$pro->aduser_id = Auth::guard('admin')->user()->id;
    	$pro->created_at = new datetime;
    	$pro->status = '1';
    	$file = $rq->file('txtImg')->getClientOriginalName();
    	$filename = time().'_'.$file;
    	$pro->images = $filename;    	
    	$rq->file('txtImg')->move('uploads/products/',$filename);
    	$pro->save();    	
    	$pro_id =$pro->id;

    	$detail = new Pro_details();

    	$detail->type = $rq->txtType;
    	$detail->origin = $rq->txtOrigin;
    	$detail->size = $rq->txtSize;
    	$detail->packet = $rq->txtPacket;
    	$detail->pro_id = $pro_id;

    	$detail->created_at = new datetime;
    	$detail->save();    	

	    return redirect('admin/sanpham/all')->with(['massage'=>' Đã thêm thành công !']);    	
    }

    public function getedit($id)
    {
        $p = Products::where('id',$id)->first();
        $c_id= $p->cat_id;

        $cate= Category::where('id',$c_id)->first();
        $p_id = $cate->parent_id;

        $parent = Category::where('id',$p_id)->first();
        $name = $parent->name;

        $cat= Category::where('parent_id', $p_id)->get();
        $pro = Products::where('id',$id)->first();
        return view('back-end.products.edit',['pro'=>$pro, 'cat'=>$cat, 'loai'=>$name]);
    }

    public function postedit(Request $rq,$id)
    {
    	$pro = Products::find($id);

        $pro->name = $rq->txtName;
        $pro->slug = str_slug($rq->txtName,'-');
        $pro->intro = $rq->txtIntro;
        $pro->promo1 = $rq->txtPromo1;
        $pro->promo2 = $rq->txtPromo2;
        $pro->promo3 = $rq->txtPromo3;
        $pro->review = $rq->txtReview;
        $pro->price = $rq->txtPrice;
        $pro->cat_id = $rq->sltCate;
        $pro->aduser_id = Auth::guard('admin')->user()->id;
        $pro->updated_at = new datetime;
        $pro->status = '1';
        $file_path = public_path('uploads/products/').$pro->images;        
        if ($rq->hasFile('txtImg')) {
            if (file_exists($file_path))
                {
                    unlink($file_path);
                }
            
            $f = $rq->file('txtImg')->getClientOriginalName();
            $filename = time().'_'.$f;
            $pro->images = $filename;       
            $rq->file('txtImg')->move('uploads/products/',$filename);
        }       
        $pro->save(); 
        
        $pro->pro_details->type = $rq->txtType;
        $pro->pro_details->origin = $rq->txtOrigin;
        $pro->pro_details->size = $rq->txtSize;
        $pro->pro_details->packet = $rq->txtPacket;

        $pro->pro_details->save();
        return redirect('admin/sanpham/all')->with(['massage'=>' Đã cập nhật sản phẩm !']);       
    }

    public function getdel($id)
    {
        $pro = Products::find($id);               
        $img = $pro->images;
        $pt = public_path('uploads/products/').$img;   
            if (file_exists($pt))
                {
                    unlink($pt);
                }                             
        $pro->delete();
        return redirect('admin/sanpham/all')->with(['massage'=>'Đã xóa sản phẩm!']);
    }

}
