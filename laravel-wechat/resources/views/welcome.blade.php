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
</head>
<body>
<div class="container">
    <div class="navbar">
        <div class="navbar-inner">
            <div class="container">
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </a> <a class="brand" href="#">Akira</a>
                <div class="nav-collapse">
                    <ul class="nav">
                        <li class="active">
                            <a href="index.html">主页</a>
                        </li>
                        <li>
                            <a href="settings.htm">帐户设置</a>
                        </li>
                        <li>
                            <a href="help.htm">帮助</a>
                        </li>
                        <li class="dropdown">
                            <a href="help.htm" class="dropdown-toggle" data-toggle="dropdown">游览 <b class="caret"></b></a>
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
    <div class="row">
        <div class="span3">
            <div class="well" style="padding: 8px 0;">
                <ul class="nav nav-list">
                    <li class="nav-header">
                        列表
                    </li>
                    <li class="active">
                        <a href="index.htm"><i class="icon-white icon-home"></i> 仪表板</a>
                    </li>
                    <li>
                        <a href="projects.htm"><i class="icon-folder-open"></i> 工程项目</a>
                    </li>
                    <li>
                        <a href="tasks.htm"><i class="icon-check"></i> 工作表</a>
                    </li>
                    <li>
                        <a href="messages.htm"><i class="icon-envelope"></i> 留言</a>
                    </li>
                    <li>
                        <a href="files.htm"><i class="icon-file"></i> 文件</a>
                    </li>
                    <li>
                        <a href="activity.htm"><i class="icon-list-alt"></i> 活动</a>
                    </li>
                    <li class="nav-header">
                        您的帐号
                    </li>
                    <li>
                        <a href="profile.htm"><i class="icon-user"></i> 侧面</a>
                    </li>
                    <li>
                        <a href="settings.htm"><i class="icon-cog"></i> 设置</a>
                    </li>
                    <li class="divider">
                    </li>
                    <li>
                        <a href="help.htm"><i class="icon-info-sign"></i> 帮助</a>
                    </li>
                    <li class="nav-header">
                        奖金模板
                    </li>
                    <li>
                        <a href="gallery.htm"><i class="icon-picture"></i> 画廊</a>
                    </li>
                    <li>
                        <a href="blank.htm"><i class="icon-stop"></i>白板</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="span9">
            <h1>
                仪表板
            </h1>
            <div class="hero-unit">
                <h1>
                    Welcome!
                </h1>
                <p>
                    充分利用彰开始3分钟之旅.
                </p>
                <p>
                    <a href="help.htm" class="btn btn-primary btn-large">Start Tour</a> <a class="btn btn-large">不用谢</a>
                </p>
            </div>
            <div class="well summary">
                <ul>
                    <li>
                        <a href="#"><span class="count">3</span> 项目</a>
                    </li>
                    <li>
                        <a href="#"><span class="count">27</span> 任务</a>
                    </li>
                    <li>
                        <a href="#"><span class="count">7</span> 信息</a>
                    </li>
                    <li class="last">
                        <a href="#"><span class="count">5</span> 文件</a>
                    </li>
                </ul>
            </div>
            <h2>
                近期活动
            </h2>
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>
                        项目
                    </th>
                    <th>
                        客户
                    </th>
                    <th>
                        类型
                    </th>
                    <th>
                        时间
                    </th>
                    <th>
                        视图
                    </th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>
                        Nike.com重新设计
                    </td>
                    <td>
                        怪兽公司
                    </td>
                    <td>
                        新任务
                    </td>
                    <td>
                        4天前
                    </td>
                    <td>
                        <a href="#" class="view-link">View</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        Nike.com Redesign
                    </td>
                    <td>
                        Monsters Inc
                    </td>
                    <td>
                        New Message
                    </td>
                    <td>
                        5 days ago
                    </td>
                    <td>
                        <a href="#" class="view-link">View</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        Nike.com Redesign
                    </td>
                    <td>
                        Monsters Inc
                    </td>
                    <td>
                        New Project
                    </td>
                    <td>
                        5 days ago
                    </td>
                    <td>
                        <a href="#" class="view-link">View</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        Twitter Server Consulting
                    </td>
                    <td>
                        Bad Robot
                    </td>
                    <td>
                        New Task
                    </td>
                    <td>
                        6 days ago
                    </td>
                    <td>
                        <a href="#" class="view-link">View</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        Childrens Book Illustration
                    </td>
                    <td>
                        Evil Genius
                    </td>
                    <td>
                        New Message
                    </td>
                    <td>
                        9 days ago
                    </td>
                    <td>
                        <a href="#" class="view-link">View</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        Twitter Server Consulting
                    </td>
                    <td>
                        Bad Robot
                    </td>
                    <td>
                        New Task
                    </td>
                    <td>
                        16 days ago
                    </td>
                    <td>
                        <a href="#" class="view-link">View</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        Twitter Server Consulting
                    </td>
                    <td>
                        Bad Robot
                    </td>
                    <td>
                        New Project
                    </td>
                    <td>
                        16 days ago
                    </td>
                    <td>
                        <a href="#" class="view-link">View</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        Twitter Server Proposal
                    </td>
                    <td>
                        Bad Robot
                    </td>
                    <td>
                        Completed Project
                    </td>
                    <td>
                        20 days ago
                    </td>
                    <td>
                        <a href="#" class="view-link">View</a>
                    </td>
                </tr>
                </tbody>
            </table>
            <ul class="pager">
                <li class="next">
                    <a href="activity.htm">更多 &rarr;</a>
                </li>
            </ul>
            <ul class="pager">
                <li class="next">
                    更多模板 <a href="http://www.cssmoban.com/" target="_blank" title="模板之家">模板之家</a> - Collect from <a href="http://www.cssmoban.com/" title="网页模板" target="_blank">网页模板</a>
                </li>
            </ul>
        </div>
    </div>
</div>
</body>
</html>