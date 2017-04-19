@extends('layouts.content')

@section('content')
	<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i>关于我们 <span class="c-gray en">&gt;</span> 公司简介<a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
	<article class="page-container">
	@if(count($errors) > 0)
		<div class="Huialert Huialert-danger">
			@if(is_object($errors))
				@foreach($errors->all() as $error)
					<i class="icon-remove"></i>&nbsp;&nbsp;*{{ $error }}
				@endforeach
			@else
				<i class="icon-remove"></i>{{ $errors }}
			@endif
		</div>
	@endif
	<form action="{{ url('admin/contact/edit')}}" method="post" class="form form-horizontal" id="form-admin-role-add" enctype="multipart/form-data">
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>选择展示图片：</label>
			<div class="formControls col-xs-8 col-sm-9"> <span class="btn-upload form-group">
				<input class="input-text upload-url" type="text" name="uploadfile" id="uploadfile" readonly placeholder="业务的点击图标" style="width:200px" value="{{ $contact->contact_imgurl }}">
				<a href="javascript:void();" class="btn btn-primary radius upload-btn"><i class="Hui-iconfont">&#xe642;</i> 浏览文件</a>
				<input type="file" name="file-2" class="input-file">
				</span> </div>
		</div>
		<div class="row cl" id="showImg">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>图片预览：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<img src="{{ asset($contact->contact_imgurl) }}" width="800" height="400" {{--class="thumbnail"--}} alt="没有找到图片">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>公司名称：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" name="title" id="" placeholder="公司名称" value="{{ $contact->contact_name }}" class="input-text">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>地     址：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" name="title" id="" placeholder="地      址" value="{{ $contact->contact_site }}" class="input-text">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>邮政编码：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" name="title" id="" placeholder="邮政编码" value="{{ $contact->contact_postcode }}" class="input-text">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>电       话：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" name="title" id="" placeholder="电       话" value="{{ $contact->contact_phone }}" class="input-text">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>传       真：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" name="title" id="" placeholder="传       真" value="{{ $contact->contact_faxes }}" class="input-text">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>电子信箱：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" name="title" id="" placeholder="电子信箱" value="{{ $contact->contact_email }}" class="input-text">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>网       址：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" name="title" id="" placeholder="网       址" value="{{ $contact->contact_url }}" class="input-text">
			</div>
		</div>
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
				<input class="btn btn-primary radius" type="submit" name="submit" value="&nbsp;修&nbsp;&nbsp;改&nbsp;">
			</div>
		</div>
	</form>
</article>

	<script type="text/javascript" src="{{ asset('style/lib/jquery.validation/1.14.0/jquery.validate.js') }}"></script>
	<script type="text/javascript" src="{{ asset('style/lib/jquery.validation/1.14.0/validate-methods.js') }}"></script>
	<script type="text/javascript" src="{{ asset('style/lib/jquery.validation/1.14.0/messages_zh.js') }}"></script>

@stop