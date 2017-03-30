<!DOCTYPE html>
<!--[if lt IE 7 ]><html lang="en" class="ie6 ielt7 ielt8 ielt9"><![endif]--><!--[if IE 7 ]><html lang="en" class="ie7 ielt8 ielt9"><![endif]--><!--[if IE 8 ]><html lang="en" class="ie8 ielt9"><![endif]--><!--[if IE 9 ]><html lang="en" class="ie9"> <![endif]--><!--[if (gt IE 9)|!(IE)]><!-->
<html lang="en"><!--<![endif]-->
<head>
    <meta charset="utf-8">
    <title>微信服务号后台系统</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('static/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('static/bootstrap/css/bootstrap-responsive.min.css') }}">
    <link rel="stylesheet" href="{{ asset('static/bootstrap/css/site.css') }}">
    <script src="{{ asset('static/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('static/bootstrap/js/site.js') }}"></script>
    <script src="{{ asset('static/jquery/jquery.min.js') }}"></script>
    <!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
</head>
<body>
<div class="container">
    {{--头部导航栏--}}
    @section('header')
        <div class="navbar">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </a> <a class="brand" href="#">Akira</a>
                    <div class="nav-collapse">
                        <ul class="nav">
                            <li class="active">
                                <a href="{{ url('wechat/servicecontent/index') }}">公众号设置</a>
                            </li>
                            <li>
                                <a href="settings.htm">微站设置</a>
                            </li>
                            <li>
                                <a href="help.htm">帮助</a>
                            </li>
                            <li class="dropdown">
                                <a href="" class="dropdown-toggle" data-toggle="dropdown">游览 <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="help.htm">介绍旅游路线</a>
                                    </li>
                                    <li>
                                        <a href="help.htm">项目组织</a>
                                    </li>
                                    <li>
                                        <a href="help.htm">任务分配</a>
                                    </li>
                                    <li>
                                        <a href="help.htm">访问权限</a>
                                    </li>
                                    <li class="divider">
                                    </li>
                                    <li class="nav-header">
                                        文件
                                    </li>
                                    <li>
                                        <a href="help.htm">如何上传多个文件</a>
                                    </li>
                                    <li>
                                        <a href="help.htm">使用文件版本</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <form class="navbar-search pull-left" action="">
                            <input type="text" class="search-query span2" placeholder="Search" />
                        </form>
                        <ul class="nav pull-right">
                            <li>
                                <a href="profile.htm">@用户名</a>
                            </li>
                            <li>
                                <a href="login.htm">退出系统</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    @show
    <div class="row">
       @yield('service')
            @section('content')
            @show
    </div>
</div>
</body>
</html>