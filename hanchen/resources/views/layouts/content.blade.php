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
    @yield('head')
    <title>后台管理</title>
</head>
<body>
@yield('content')
<!--_footer 作为公共模版-->
<script type="text/javascript" src="{{ asset('style/lib/jquery/1.9.1/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('style/lib/layer/2.4/layer.js') }}"></script>
<script type="text/javascript" src="{{ asset('style/static/h-ui/js/H-ui.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('style/static/h-ui.admin/js/H-ui.admin.js') }}"></script>
<!--/_footer 作为公共模版-->
<script type="text/javascript" src="{{ asset('style/lib/My97DatePicker/4.8/WdatePicker.js') }}"></script>
<script type="text/javascript" src="{{ asset('style/lib/datatables/1.10.0/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('style/lib/laypage/1.2/laypage.js') }}"></script>
</body>