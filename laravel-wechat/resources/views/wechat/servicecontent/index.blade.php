@extends('wechat.service');

@section('content')
    <div class="span9">
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
        <ul class="pager">
            <li class="next">
                <a href="activity.htm">更多 &rarr;</a>
            </li>
        </ul>
    </div>
    @stop