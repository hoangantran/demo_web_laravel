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
                            Sửa Danh Mục
                        </header>
                        <div class="panel-body">
                            <div class="form">
                                <form class="cmxform form-horizontal"  method="post" action=""  novalidate="novalidate">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="input-id" class="col-lg-2">Danh mục cha</label>
                                        <div class="col-lg-12">
                                            <select name="sltCate" id="inputSltCate" class="form-control">
                                                <option value="0">- ROOT --</option>
                                                <?php MenuMulti($cat,0,$str='---| ',$data['parent_id']); ?>   		
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <label for="name" class="col-lg-2">Tên Danh Mục</label>
                                        <div class="col-lg-12">
                                            <input class="form-control " id="txtCateName" name="txtCateName" type="text" value="{!! isset($data['name']) ? $data['name']: null !!}">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <div class="col-lg-2">
                                            <button class="btn btn-primary" type="submit">Lưu Danh Mục</button>
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
