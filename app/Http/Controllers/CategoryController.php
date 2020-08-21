<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use DateTime;

class CategoryController extends Controller
{
    public function getlist()
   {
		$data = Category::all();
		return View ('back-end.category.cat-list',['data'=>$data]);
   }
   public function getadd()
   {	
		$data = Category::all();
		return View ('back-end.category.add',['data'=>$data]);
   }

   public function postadd(Request $request)
   {
		$cat = new Category();
        $cat->parent_id= $request->sltCate;
        $cat->name= $request->txtCateName;
        $cat->slug = str_slug($request->txtCateName,'-');
        $cat->created_at = new DateTime;
        $cat->save();
        return redirect()->route('getcat')->with(['massage'=>' Đã thêm thành công !']);     
   }

   public function getedit($id)
   {
        $cat = Category::all();
        $data = Category::findOrFail($id)->toArray();
        return View ('back-end.category.edit',['cat'=>$cat,'data'=>$data]);
    }

    public function postedit($id,Request $request)
   {
       
        $cat = category::find($id);   
        $cat->name = $request->txtCateName;
        $cat->slug = str_slug($request->txtCateName,'-');
        $cat->parent_id = $request->sltCate;
        $cat->updated_at = new DateTime;
        $cat->save();
        return redirect()->route('listcat')->with(['massage'=>' Đã sửa thành công !']);
   }

   public function getdel($id)
   {
      $parent_id = category::where('parent_id',$id)->count();
      if ($parent_id==0) {
         $category = category::find($id);
         $category->delete();
         return redirect()->route('getcat')->with(['massage'=>'Đã xóa !']);
      } else{
         echo '<script type="text/javascript">
                  alert("Không thể xóa danh mục này !");                
                window.location = "';
                echo route('getcat');
            echo '";
         </script>';
      }
   }

}
