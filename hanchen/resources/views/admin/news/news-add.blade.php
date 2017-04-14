@extends('layouts.content')

@section('head')
	<style>
		form {
			margin: 0;
		}
		textarea {
			display: block;
		}
	</style>
	<link rel="stylesheet" href="{{ asset('style/kindeditor/themes/default/default.css') }}" />
	<script charset="utf-8" src="{{ asset('style/kindeditor/kindeditor-min.js') }}"></script>
	<script charset="utf-8" src="{{ asset('style/kindeditor/lang/zh_CN.js') }}"></script>
	<script>
		var editor;
		KindEditor.ready(function(K) {
			editor = K.create('textarea[name="content"]', {
				allowFileManager : true
			});
			K('input[name=getHtml]').click(function(e) {
				alert(editor.html());
			});
			K('input[name=isEmpty]').click(function(e) {
				alert(editor.isEmpty());
			});
			K('input[name=getText]').click(function(e) {
				alert(editor.text());
			});
			K('input[name=selectedHtml]').click(function(e) {
				alert(editor.selectedHtml());
			});
			K('input[name=setHtml]').click(function(e) {
				editor.html('<h3>Hello KindEditor</h3>');
			});
			K('input[name=setText]').click(function(e) {
				editor.text('<h3>Hello KindEditor</h3>');
			});
			K('input[name=insertHtml]').click(function(e) {
				editor.insertHtml('<strong>插入HTML</strong>');
			});
			K('input[name=appendHtml]').click(function(e) {
				editor.appendHtml('<strong>添加HTML</strong>');
			});
			K('input[name=clear]').click(function(e) {
				editor.html('');
			});
		});
	</script>
	@stop

@section('content')
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
	<form action="{{ url('admin/link') }}" method="post" class="form form-horizontal" id="form-admin-role-add">
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>链接名：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" name="link_name" id="" placeholder="显示在主界面信息" value="{{ old('link_name') }}" class="input-text">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>链接地址：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" name="link_url" id="" placeholder="注意链接地址" value="{{ old('link_url') }}" class="input-text">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">链接描述：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<textarea name="content" style="width:800px;height:400px;visibility:hidden;">KindEditor</textarea>
				{{--<textarea name="link_describe" cols="" rows="" class="textarea"  placeholder="说点什么...最少输入10个字符，最多200字" datatype="*10-100" dragonfly="true" nullmsg="备注不能为空！" onKeyUp="$.Huitextarealength(this,200)">{{ old('link_describe') }}</textarea>
--}}			{{--<p class="textarea-numberbar"><em class="textarea-length">0</em>/200</p>--}}
			</div>
		</div>
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
				<input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提&nbsp;&nbsp;交&nbsp;&nbsp;">
			</div>
		</div>
	</form>
</article>

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="{{ asset('style/lib/jquery.validation/1.14.0/jquery.validate.js') }}"></script>
<script type="text/javascript" src="{{ asset('style/lib/jquery.validation/1.14.0/validate-methods.js') }}"></script>
<script type="text/javascript" src="{{ asset('style/lib/jquery.validation/1.14.0/messages_zh.js') }}"></script>
<!--/请在上方写此页面业务相关的脚本-->
@stop