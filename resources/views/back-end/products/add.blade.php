@extends('back-end.layouts.master')
@section('content')
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<div class="form-w3layouts">
            <!-- page start-->
            @if (count($errors) > 0)
					    <div class="alert alert-danger">
					        <ul>
					            @foreach ($errors->all() as $error)
					                <li>{{ $error }}</li>
					            @endforeach
					        </ul>
					    </div>
					    @elseif ( Session::get('massage'))
					    	<div class="alert alert-success">
						        <ul>
						            {!! Session::get('massage') !!}	
						        </ul>
						    </div>
			@endif
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm mới sản phẩm: {!!$loai!!}
                        </header>
                        <div class="panel-body" style="color:#27ae60;">
                            <div class="form">
                                <form class="cmxform form-horizontal " id="addProForm" method="post" action=""  enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="input-id" class="col-lg-12">chọn danh mục</label>
                                        <div class="col-lg-12">
                                            <select name="sltCate" id="inputSltCate" class="form-control">
                                                <option value="">-- Chọn danh mục --</option>
                                                @foreach($cat as $row)
					      				            <option value="{!!$row->id!!}" >{!! '--| --| '.$row->name!!}</option> 	
					      			            @endforeach   		
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="name" class="col-lg-12">Tên sản phẩm</label>
                                        <div class="col-lg-12">
                                            <input class="form-control " id="txtinputName" name="txtName" type="text" >
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="intro" class="col-lg-12">Thông Tin Nổi Bật</label>
                                        <div class="col-lg-12">
                                            <input class="form-control " id="txtinputIntro" name="txtIntro" type="text">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="promo" class="col-lg-12">Khuyễn mãi</label>
                                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                            khuyễn mại 1 : <input type="text" name="txtPromo1" id="inputtxtPromo1" value="{{ old('txtpromo1') }}" class="form-control" >
                                        </div>
                                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                            khuyễn mại 2 : <input type="text" name="txtPromo2" id="inputtxtPromo2" value="{{ old('txtpromo2') }}" class="form-control" >
                                        </div>
                                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                            khuyễn mại 3 : <input type="text" name="txtPromo3" id="inputtxtPromo3" value="{{ old('txtpromo3') }}" class="form-control" >
                                        </div>				      			
                                    </div>

                                    <div class="form-group">				      			
                                        <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
                                            Hình ảnh : <input type="file" name="txtImg" accept="image/jpg, image/jpeg, image/png" id="inputtxtImg" value="{{ old('txtimg') }}" class="form-control" required="required">
                                        </div>
                                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                                            Giá bán : <input type="number" name="txtPrice" id="inputtxtPrice" class="form-control" value="{{ old('txtprice') }}" required="required">
                                        </div>			      			
				      		        </div>
                                    
                                    <div class="form-group">
				      			        <label for="input-id" class="col-lg-12"> Chi tiết sản phẩm</label>
				      		
                                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                            Loại Gỗ : <input type="text" name="txtType" id="inputtxtType" value="{{ old('txtType') }}" class="form-control" >
                                        </div>
                                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                            Xuất sứ : <input type="text" name="txtOrigin" id="inputtxtOrigin" value="{{ old('txtOrigin') }}" class="form-control" >
                                        </div>
                                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                            Kích thước : <input type="text" name="txtSize" id="inputtxtSize" value="{{ old('txtSize') }}" class="form-control" >
                                        </div>
                                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">	
                                            Gói sản phẩm : <input type="text" name="txtPacket" id="inputtxtPacket" value="{{ old('txtPacket') }}" class="form-control">
                                        </div>
					      		    </div>

                                    <div class="form-group">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <label for="input-id">Bài đánh giá chi tiết</label>
                                            <textarea name="txtReview" id="inputtxtReview" class="form-control" rows="4" value="{{ old('txtReview') }}" required="required"></textarea>
                                            <script type="text/javascript">
                                                var editor = CKEDITOR.replace('txtReview',{
                                                    language:'vi'
                                                });
                                            </script>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-12">
                                            <button class="btn btn-primary" type="submit">Thêm Sản Phẩm</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <!-- page end-->
        </div>
<!--main content end-->
 @endsection
