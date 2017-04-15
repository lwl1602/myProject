@extends('layouts.content')

@section('content')
	<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 新闻管理 <span class="c-gray en">&gt;</span> 新闻列表<a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
	<div class="page-container">
	<div class="cl pd-5 bg-1 bk-gray"> <span class="l"> <a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a> <a class="btn btn-primary radius" href="{{ url('admin/news/create') }}"><i class="Hui-iconfont">&#xe600;</i> 添加新闻</a> </span> <span class="r">共有数据：<strong>{{ $num }}</strong> 条</span> </div>
	<table class="table table-border table-bordered table-hover table-bg">
		<thead>
			<tr>
				<th scope="col" colspan="6">新闻列表</th>
			</tr>
			<tr class="text-c">
				<th width="25"><input type="checkbox" value="" name=""></th>
				<th width="40">ID</th>
				<th width="200">新闻标题</th>
				<th >新闻内容</th>
				<th width="70">操作</th>
			</tr>
		</thead>
		<tbody>
		@for($i = 0;$i < $num;$i++ )
			<tr class="text-c">
				<td><input type="checkbox" value="" name=""></td>
				<td>{{ $i+1 }}</td>
				<td>{{ $newses[$i]->news_title }}</td>
				<td>{{ html_entity_decode($newses[$i]->news_text) }}</td>
				<td class="f-14"><a title="编辑" href="{{ url('admin/news/'.$newses[$i]->news_id) }}" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a> <a title="删除" href="javascript:;" onclick="admin_role_del(this,'{{ $newses[$i]->news_id }}')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
			</tr>
			@endfor
		</tbody>
	</table>
</div>

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="{{ asset('style/lib/datatables/1.10.0/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript">
/*管理员-角色-添加*/
function admin_role_add(title,url,w,h){
	layer_show(title,url,w,h);
}
/*管理员-角色-编辑*/
function admin_role_edit(title,url,id,w,h){
	layer_show(title,url,w,h);
}
/*管理员-角色-删除*/
function admin_role_del(obj,id){
	layer.confirm('角色删除须谨慎，确认要删除吗？',function(index){
		$.ajax({
			type: 'delete',
			url: '{{ url('admin/news') }}/'+id,
			dataType: 'json',
			success: function(data){
				if(data != null || data != ''){
					$(obj).parents("tr").remove();
					layer.msg(data.msg,{icon:1,time:1000});
				}
			},
			error:function(data) {
				console.log(data.msg);
			},
		});		
	});
}
</script>
@stop