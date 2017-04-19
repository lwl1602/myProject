@extends('layouts.content')

@section('content')
<article class="page-container">
	@if(count($errors) > 0)
		<div class="cl pd-5 bg-1 bk-gray mt-20">
			@if(is_object($errors))
				@foreach($errors->all() as $error)
					<p style="color: red">{{ $error }}</p>
				@endforeach
			@else
				<p style="color: red">{{ $errors }}</p>
			@endif
		</div>
	@endif
	<form class="form form-horizontal" id="form-admin-add" action="{{ url('admin/adminstore') }}">
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>管理员账号：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" value="{{ old('username') }}" placeholder="账号" id="adminName" name="username">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>初始密码：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="password" class="input-text" autocomplete="off" value="{{ old('password') }}" placeholder="密码" id="password" name="password">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>确认密码：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="password" class="input-text" autocomplete="off" value="{{ old('password_confirmation') }}" placeholder="确认新密码" id="password2" name="password_confirmation">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3">角色：</label>
		<div class="formControls col-xs-8 col-sm-9"> <span class="select-box" style="width:150px;">
			<select class="select" name="limit" size="1">
				<option value="1">超级管理员</option>
				<option value="2">普通管理员</option>
			</select>
			</span>
		</div>
	</div>
	<div class="row cl">
		<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
			<input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
		</div>
	</div>
	</form>
</article>
@stop