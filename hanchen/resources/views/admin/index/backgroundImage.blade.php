@extends('layouts.admin')

@section('content')
    <!--面包屑导航 开始-->
    <div class="crumb_warp">

        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{ url('admin/info') }}">首页</a> &raquo;  首页导航
    </div>
    <!--面包屑导航 结束-->

    <div class="page-container">
        <form class="form form-horizontal" id="form-article-add">
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">图片上传：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <div class="uploader-list-container">
                        <div class="queueList">
                            <div id="dndArea" class="placeholder">
                                <div id="filePicker-2"></div>
                                <p>或将照片拖到这里，单次最多可选300张</p>
                            </div>
                        </div>
                        <div class="statusBar" style="display:none;">
                            <div class="progress"> <span class="text">0%</span> <span class="percentage"></span> </div>
                            <div class="info"></div>
                            <div class="btns">
                                <div id="filePicker2"></div>
                                <div class="uploadBtn">开始上传</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </form>

    </div>

    <!--搜索结果页面 列表 开始-->
    <form action="#" method="post">
        <div class="result_wrap">
            <div class="result_title">
                <h3>首页操作</h3>
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
            <!--快捷导航 开始-->
            <div class="result_content">
                <div class="short_wrap">
                    <a href="{{ url('admin/article/create') }}"><i class="fa fa-plus"></i>添加图片</a>
                    <a href="{{ url('admin/article') }}"><i class="fa fa-recycle"></i>所有图片</a>
                    <a href="{{ url('admin/category') }}"><i class="fa fa-refresh"></i>更新</a>
                </div>
            </div>
            <!--快捷导航 结束-->
        </div>



        <input type="submit" value="提交">
        <input type="button" class="back" onclick="history.go(-1)" value="返回">
    </form>
    <!--搜索结果页面 列表 结束-->

    <script>
        function changeOrder(obj,cate_id) {
            var cate_order = $(obj).val();
            $.post("{{ url('admin/cate/changeorder') }}",{'_token':'{{ csrf_token() }}','cate_id':cate_id,'cate_order':cate_order},function (data) {
                if(data.status == 0){
                    layer.msg(data.msg, {icon: 6});
                }else{
                    layer.msg(data.msg, {icon: 5});
                }
            });
        }   
        
        function delCate(cate_id) {
            layer.confirm('您确定要删除这个分类吗？', {
                btn: ['确定','取消'] //按钮
            }, function(){
                $.post('{{ url('admin/category/') }}/'+cate_id,{'_method':'delete','_token':'{{ csrf_token() }}'},function (data) {
                        if(data.status==0){
                            location.href = location.href;//刷新当前页面
                            layer.msg(data.msg, {icon: 6});
                        }else{
                            layer.msg(data.msg, {icon: 5});
                        }
                });
            }, function(){
                layer.msg('也可以这样', {
                    time: 20000, //20s后自动关闭
                    btn: ['明白了', '知道了']
                });
            });
        }

    </script>

@stop