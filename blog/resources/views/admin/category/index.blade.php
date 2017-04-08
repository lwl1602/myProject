@extends('layouts.admin')

@section('content')
    <!--面包屑导航 开始-->
    <div class="crumb_warp">

        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{ url('admin/info') }}">首页</a> &raquo;  全部分类
    </div>
    <!--面包屑导航 结束-->

	<!--结果页快捷搜索框 开始-->
	{{--<div class="search_wrap">
        <form action="" method="post">
            <table class="search_tab">
                <tr>
                    <th width="120">选择分类:</th>
                    <td>
                        <select onchange="javascript:location.href=this.value;">
                            <option value="">全部</option>
                            <option value="http://www.baidu.com">百度</option>
                            <option value="http://www.sina.com">新浪</option>
                        </select>
                    </td>
                    <th width="70">关键字:</th>
                    <td><input type="text" name="keywords" placeholder="关键字"></td>
                    <td><input type="submit" name="sub" value="查询"></td>
                </tr>
            </table>
        </form>
    </div>--}}
    <!--结果页快捷搜索框 结束-->

    <!--搜索结果页面 列表 开始-->
    <form action="#" method="post">
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
            <!--快捷导航 开始-->
            <div class="result_content">
                <div class="short_wrap">
                    <a href="{{ url('admin/category/create') }}"><i class="fa fa-plus"></i>添加分类</a>
                    <a href="{{ url('admin/category') }}"><i class="fa fa-recycle"></i>所有分类</a>
                    <a href="{{ url('admin/category') }}"><i class="fa fa-refresh"></i>更新排序</a>
                </div>
            </div>
            <!--快捷导航 结束-->
        </div>

        <div class="result_wrap">
            <div class="result_content">
                <table class="list_tab">
                    <tr>
                        <th class="tc" width="5%">排序</th>
                        <th class="tc" width="5%">ID</th>
                        <th>类型</th>
                        <th>标题</th>
                        <th>来源</th>
                        <th>网站描述</th>
                        <th>查看次数</th>
                        <th>操作</th>
                    </tr>
                    @foreach($date as $ele)
                    <tr>
                        <td class="tc">
                            <input type="text" name="ord[]" onchange="changeOrder(this,{{ $ele->cate_id }})" value="{{ $ele->cate_order }}">
                        </td>
                        <td class="tc">{{ $ele->cate_id }}</td>
                        <td>
                            <a href="#">{{ $ele->_cate_name }}</a>
                        </td>
                        <td>{{ $ele->cate_title }}</td>
                        <td>{{ $ele->cate_keywords }}</td>
                        <td>{{ $ele->cate_description }}</td>
                        <td>{{ $ele->cate_view }}</td>
                        <td>
                            <a href="{{url('admin/category/'.$ele->cate_id.'/edit')}}">修改</a>
                            <a href="javascript:;" onclick="delCate({{ $ele->cate_id }})">删除</a>
                        </td>
                    </tr>
                    @endforeach
                </table>


<div class="page_nav">
<div>
<a class="first" href="/wysls/index.php/Admin/Tag/index/p/1.html">第一页</a> 
<a class="prev" href="/wysls/index.php/Admin/Tag/index/p/7.html">上一页</a> 
<a class="num" href="/wysls/index.php/Admin/Tag/index/p/6.html">6</a>
<a class="num" href="/wysls/index.php/Admin/Tag/index/p/7.html">7</a>
<span class="current">8</span>
<a class="num" href="/wysls/index.php/Admin/Tag/index/p/9.html">9</a>
<a class="num" href="/wysls/index.php/Admin/Tag/index/p/10.html">10</a> 
<a class="next" href="/wysls/index.php/Admin/Tag/index/p/9.html">下一页</a> 
<a class="end" href="/wysls/index.php/Admin/Tag/index/p/11.html">最后一页</a> 
<span class="rows">11 条记录</span>
</div>
</div>



                <div class="page_list">
                    <ul>
                        <li class="disabled"><a href="#">&laquo;</a></li>
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">&raquo;</a></li>
                    </ul>
                </div>
            </div>
        </div>
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