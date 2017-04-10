@extends('layouts.admin')

@section('content')
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="#">首页</a> &raquo; 添加文章
    </div>
    <!--面包屑导航 结束-->

	<!--结果集标题与导航组件 开始-->
	<div class="result_wrap">
        <div class="result_title">
            <h3>分类管理</h3>
            @if(count($errors) > 0)
                <div class="mark">
                    @if(is_object($errors))
                        @foreach($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    @else
                        <p>{{ $errors }}</p>
                    @endif
                </div>
            @endif
        </div>
        <div class="result_content">
            <div class="short_wrap">
                <a href="{{ url('admin/article/create') }}"><i class="fa fa-plus"></i>添加文章</a>
                <a href="{{ url('admin/article') }}"><i class="fa fa-recycle"></i>所有文章</a>
            </div>
        </div>
    </div>
    <!--结果集标题与导航组件 结束-->
    
    <div class="result_wrap">
        <form action="{{ url('admin/category') }}" method="post">
            {{ csrf_field() }}
            <table class="add_tab">
                <tbody>
                    <tr>
                        <th width="120">分类：</th>
                        <td>
                            <select name="cate_id">
                                @foreach($data as $ele)
                                <option value="{{ $ele->cate_id }}">{{ $ele->_cate_name }}</option>
                                    @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>文章标题：</th>
                        <td>
                            <input type="text" class="lg" name="art_title">
                        </td>
                    </tr>
                    <tr>
                        <th>编辑：</th>
                        <td>
                            <input type="text" class="sm" name="art_editor">
                        </td>
                    </tr>
                    <tr>
                        <th>缩略图：</th>
                        <td>
                            <script src="{{ asset('style/uploadify/jquery.uploadify.min.js') }}" type="text/javascript"></script>
                            <link rel="stylesheet" type="text/css" href="{{ asset('style/uploadify/uploadify.css') }}">
                            <input type="text" size="50" name="art_thumb">
                            <input id="file_upload" name="file_upload" type="file" multiple="true">
                            <script type="text/javascript">
                                <?php $timestamp = time();?>
                                $(function() {
                                    $('#file_upload').uploadify({
                                        'buttonText' : '上传图片',
                                        'formData'     : {
                                            'timestamp' : '<?php echo $timestamp;?>',
                                            '_token'     : "{{ csrf_token() }}"
                                        },
                                        'swf'      : "{{ asset('style/uploadify/uploadify.swf') }}",
                                        'uploader' : "{{ asset('admin/upload') }}",
                                        'onUploadSuccess' : function(file, data, response) {
                                            $('input[name=art_thumb]').val(data);
                                            $('#art_thumb_img').attr('src',"/"+data);
                                        }
                                    });
                                });
                            </script>
                            <style>
                                .uploadify{display: inline-block;}
                                .uploadify-button{border: none; border-radius: 5px; margin-top:8px}
                                table.add_tab tr td span.uploadify-button-text{color:#fff;margin:0}
                            </style>
                            <img src="" alt="" id="art_thumb_img">
                        </td>
                    </tr>
                    <tr>
                        <th>关键词：</th>
                        <td>
                            <input type="text" class="lg" name="art_tag">
                        </td>
                    </tr>
                    <tr>
                        <th>文章描述：</th>
                        <td>
                            <textarea name="art_description"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <th>文章内容：</th>
                        <td>
                            <script type="text/javascript" charset="utf-8" src="{{ asset('style/ueditor/ueditor.config.js') }}"></script>
                            <script type="text/javascript" charset="utf-8" src="{{ asset('style/ueditor/ueditor.all.js')}}"></script>
                            <script type="text/javascript" src="{{ asset('style/ueditor/lang/zh-cn/zh-cn.js')}}"></script>
                            <script type="text/plain" id="container" name="art_content" style="width:80%;height:360px;"></script>
                            <script type="text/javascript">
                                /*实例化编辑器*/
                                var ue = UE.getEditor('container');
                            </script>

                            {{--由于编辑器样式和当前页面样式冲突，导致按钮有些错位，所以使用下面的矫正样式矫正--}}
                            <style>
                                .edui-default{line-height: 28px}
                                div.edui-combox-body,div.edui-button-body,div.edui-splitbutton-body
                                {overflow: hidden; height: 20px}
                                div.edit-box{overflow: hidden; height: 22px}
                            </style>
                        </td>
                    </tr>
                    <tr>
                        <th></th>
                        <td>
                            <input type="submit" value="提交">
                            <input type="button" class="back" onclick="history.go(-1)" value="返回">
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
@stop