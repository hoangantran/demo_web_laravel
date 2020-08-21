<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// -------------------- Route Font-end --------------------
Route::get('','PagesController@index')->name('getindex');

//Oder
Route::get('dat-hang','PagesController@getoder');
Route::post('dat-hang','PagesController@postoder');

//Cart
Route::get('/giohang','PagesController@getcart')->name('getcart');
Route::get('gio-hang/addcart/{id}','PagesController@addcart');
Route::get('gio-hang/delete/{id}','PagesController@deletecart');
Route::get('gio-hang/update/{id}/{qty}-{ac}','PagesController@updatecart');

//Category
Route::get('/{id}-{cat_slug}','PagesController@getcate');
Route::get('/{cat_slug}/{id}-{slug}','PagesController@detail');

//Products
Route::get('productsall','PagesController@getallproduct')->name('productsall');

//Users
Route::get('login','AuthController@showloginform')->name('showlogin');
Route::post('home', 'AuthController@login')->name('postlogin');
Route::get('logout', 'AuthController@logout')->name('logout');
Route::post('login', 'AuthController@register')->name('postregister');
Route::get('checkusername', 'AuthController@checkusername');
Route::get('checkemail', 'AuthController@checkemail');
Route::post('search','PagesController@search')->name('postsearch');
Route::get('information','AuthController@userinformation');
Route::post('information/update','AuthController@updateInformation');
Route::get('order','OdersController@orderslist');
Route::get('order/detail','OdersController@orderdetail');


// -------------------- End Route Font-end --------------------


// -------------------- Route Back-end --------------------

Route::get('admin/login', 'AdminAuthController@showloginform')->name('adlogin');
Route::post('admin/home', 'AdminAuthController@login');
Route::get('admin/logout', 'AdminAuthController@logout');


Route::prefix('admin')->group(function () {
    
    Route::get('home', function(){return view('back-end.home');});

    // -------------------- Quản lý Nhân Viên --------------------
    Route::prefix('/nhanvien')->group(function () {
        Route::get('', 'Admin_usersController@getlist')->name('getlstmen');
        
        Route::get('add', 'Admin_usersController@getadd')->name('getmem');
        Route::post('add', 'Admin_usersController@postadd');

        Route::get('edit/{id}', 'Admin_usersController@getedit')->name('geteditmen');
        Route::post('edit/{id}', 'Admin_usersController@postedit');

        Route::get('del/{id}', 'Admin_usersController@getdel');

        Route::get('search', 'Admin_usersController@search');
    });

    // -------------------- Quản lý Mục Sản Phẩm --------------------
    Route::prefix('/danhmuc')->group(function () {
        Route::get('', 'CategoryController@getlist')->name('listcat');
        
        Route::get('add', 'CategoryController@getadd')->name('getcat');
        Route::post('add', 'CategoryController@postadd');

        Route::get('edit/{id}', 'CategoryController@getedit');
        Route::post('edit/{id}', 'CategoryController@postedit');

        Route::get('del/{id}', 'CategoryController@getdel');
    });

    // -------------------- Quản lý Sản Phẩm --------------------
    Route::prefix('/sanpham')->group(function () {
        Route::get('{loai}', 'ProductsController@getlist');

        Route::get('{loai}/add', 'ProductsController@getadd');
        Route::post('{loai}/add', 'ProductsController@postadd');

        Route::get('edit/{id}', 'ProductsController@getedit');
        Route::post('edit/{id}', 'ProductsController@postedit');

        Route::get('del/{id}', 'ProductsController@getdel');
   });

    // -------------------- Quản lý Đơn Hàng --------------------
    Route::group(['prefix' => '/donhang'], function() {;
        Route::get('', 'OdersController@getlist');

        Route::get('/del/{id}', 'OdersController@getdel');
        
        Route::get('/detail/{id}', 'OdersController@getdetail');
        Route::post('/detail/{id}', 'OdersController@postoder');
    });

});
// -------------------- End Route Back-end --------------------