<!DOCTYPE HTML>
<html>
<head>
  <meta charset="utf-8">
  <meta name="renderer" content="webkit|ie-comp|ie-stand">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
  <meta http-equiv="Cache-Control" content="no-siteapp" />
  <!--[if lt IE 9]>
  <script type="text/javascript" src="{{asset('style/lib/html5shiv.js') }}"></script>
  <script type="text/javascript" src="{{asset('style/lib/respond.min.js') }}"></script>
  <![endif]-->
  <link rel="stylesheet" type="text/css" href="{{ asset('style/static/h-ui/css/H-ui.min.css') }}" />
  <link rel="stylesheet" type="text/css" href="{{ asset('style/static/h-ui.admin/css/H-ui.admin.css') }}" />
  <link rel="stylesheet" type="text/css" href="{{ asset('style/lib/Hui-iconfont/1.0.8/iconfont.css') }}" />
  <link rel="stylesheet" type="text/css" href="{{ asset('style/static/h-ui.admin/skin/default/skin.css') }}" id="skin" />
  <link rel="stylesheet" type="text/css" href="{{ asset('style/static/h-ui.admin/css/style.css') }}" />
  <link  rel="stylesheet" type="text/css" href="{{ asset('style/static/h-ui.admin/css/H-ui.login.css') }}"/>
  <!--[if IE 6]>
  <script type="text/javascript" src="{{ asset('style/lib/DD_belatedPNG_0.0.8a-min.js') }}" ></script>
  <script>DD_belatedPNG.fix('*');</script>
  <![endif]-->
  <title>后台管理</title>
</head>
<body>
<input type="hidden" id="TenantId" name="TenantId" value="" />
<div class="header"><h1>慧值后台管理系统</h1></div>
<div class="loginWraper">
  <div id="loginform" class="loginBox">
    @if(session('msg'))
      <p style="color:red" align="center">{{ session('msg') }}</p>
    @endif
    <form class="form form-horizontal" action="#" method="post">
      {{ csrf_field() }}
      <div class="row cl">
        <label class="form-label col-xs-3"><i class="Hui-iconfont">&#xe60d;</i></label>
        <div class="formControls col-xs-8">
          <input id="" name="user_name" type="text" placeholder="账户" class="input-text size-L">
        </div>
      </div>
      <div class="row cl">
        <label class="form-label col-xs-3"><i class="Hui-iconfont">&#xe60e;</i></label>
        <div class="formControls col-xs-8">
          <input id="" name="user_pass" type="password" placeholder="密码" class="input-text size-L">
        </div>
      </div>
      <div class="row cl">
        <div class="formControls col-xs-8 col-xs-offset-3">
          <input class="input-text size-L" name="code" type="text" placeholder="验证码" onblur="if(this.value==''){this.value='验证码:'}" onclick="if(this.value=='验证码:'){this.value='';}" value="验证码:" style="width:150px;">
          <img src="{{ url('admin/code') }}" alt="" onclick="this.src='{{ url('admin/code') }}?'+Math.random()">
        </div>
      </div>
      <div class="row cl">
        <div class="formControls col-xs-8 col-xs-offset-3">
          <label for="online">
            <input type="checkbox" name="online" id="online" value="">
            使我保持登录状态</label>
        </div>
      </div>
      <div class="row cl">
        <div class="formControls col-xs-8 col-xs-offset-3">
          <input name="" type="submit" class="btn btn-success radius size-L" value="立&nbsp;&nbsp;即&nbsp;&nbsp;登&nbsp;&nbsp;录">
        </div>
      </div>
    </form>
  </div>
</div>
<div class="footer">Copyright 慧值</div>
<script type="text/javascript" src="{{ asset('style/lib/jquery/1.9.1/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('style/static/h-ui/js/H-ui.min.js') }}"></script>
</body>