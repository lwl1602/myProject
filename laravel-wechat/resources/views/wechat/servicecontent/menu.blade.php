@extends('wechat.service');

@section('content')
    <h1>
        微信菜单设置
    </h1>
    <button type="button" class="btn btn-success">添加一个一级菜单</button>
    <br><br>
    <div class="view">
        <div class="row clearfix">
            <div class="col-md-6 column ui-sortable">
                进入到了菜单自定义
            </div>
            <div class="col-md-6 column ui-sortable">
                右边的菜单自定义
            </div>
        </div>
    </div>
    @stop