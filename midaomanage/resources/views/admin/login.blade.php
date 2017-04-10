<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="{{ asset('style/css/ch-ui.admin.css') }}">
	<link rel="stylesheet" href="{{ asset('style/font/css/font-awesome.min.css') }}">
</head>
<body style="background:#F3F3F4;">
	<div class="login_box">
		<h1>MI DAO WANG LUO</h1>
		<h2>欢迎使用米稻官网后台管理</h2>
		<div class="form">
			@if(session('msg'))
				<p style="color:red">{{ session('msg') }}</p>
				@endif
			<form action="#" method="post">
				{{ csrf_field() }}  {{--验证token--}}
				<ul>
					<li>
					<input type="text" name="user_name" class="text"/>
						<span><i class="fa fa-user"></i></span>
					</li>
					<li>
						<input type="text" name="user_pass" class="text"/>
						<span><i class="fa fa-lock"></i></span>
					</li>
					<li>
						<input type="text" class="code" name="code"/>
						<span><i class="fa fa-check-square-o"></i></span>
						<img src="{{ url('admin/code') }}" alt="" onclick="this.src='{{ url('admin/code') }}?'+Math.random()">
					</li>
					<li>
						<input type="submit" value="立即登陆"/>
					</li>
				</ul>
			</form>
			<p><a href="#">返回首页</a> &copy; 2016 Powered by <a href="http://www.chenhua.club" target="_blank">http://www.chenhua.club</a></p>
		</div>
	</div>
</body>
</html>