@extends('member.mylayouts');

@section('service')
    <div class="span3">
        <div class="well" style="padding: 8px 0;">
            <ul class="nav nav-list">
                <li class="nav-header">
                    列表
                </li>
                <li class="active">
                    <a href="{{ url('wechat/servicecontent/index') }}"><i class="icon-white icon-home"></i> 主页面</a>
                </li>
                <li>
                    <a href="{{ url('wechat/servicecontent/menu') }}"><i class="icon-folder-open"></i> 自定义菜单</a>
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
@stop

{{--@section('content')
    <h1>
        微信公众号后台管理系统
    </h1>
    <div class="hero-unit">
        <h1>
            Welcome!
        </h1>
        <p>
            主要是用来设置微信公众号的菜单，子菜单，微信公众号发送单条消息，多条消息，图文消息，对微信公众号关注用户进行管理的平台
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
@stop--}}
