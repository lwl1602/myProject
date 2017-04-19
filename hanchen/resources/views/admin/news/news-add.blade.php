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
			K('input[name=submit]').click(function(e) {
				document.getElementById('html').value = editor.html();
				document.getElementById('text').value = editor.text();
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
	<form action="{{ url('admin/news') }}" method="post" class="form form-horizontal" id="form-admin-role-add">
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>新闻标题：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" name="title" id="" placeholder="显示在主界面信息" value="{{ old('name') }}" class="input-text">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">新闻内容：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<textarea name="content" style="width:800px;height:400px;visibility:hidden;">{{ old('content') }}</textarea>
				<input type="hidden" name="html" id="html" value="">
				<input type="hidden" name="text" id="text" value="">
				{{--<textarea name="link_describe" cols="" rows="" class="textarea"  placeholder="说点什么...最少输入10个字符，最多200字" datatype="*10-100" dragonfly="true" nullmsg="备注不能为空！" onKeyUp="$.Huitextarealength(this,200)">{{ old('link_describe') }}</textarea>
--}}			{{--<p class="textarea-numberbar"><em class="textarea-length">0</em>/200</p>--}}
			</div>
		</div>
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
				<a class="btn btn-primary radius" href="{{ url('admin/news') }}" name="submit">&nbsp;返&nbsp;回&nbsp;列&nbsp;表&nbsp;</a>
				<input class="btn btn-primary radius" type="submit" name="submit" value="&nbsp;&nbsp;提&nbsp;&nbsp;交&nbsp;&nbsp;">
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