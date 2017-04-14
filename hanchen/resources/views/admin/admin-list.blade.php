@extends('layouts.content')

@section('content')
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 管理员管理 <span class="c-gray en">&gt;</span> 管理员列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<div class="cl pd-5 bg-1 bk-gray mt-20">
	@if((session('user')->user_limit) != 2 )
	 <span class="l">
		 <a href="javascript:;" onclick="admin_add('添加管理员','{{ url('admin/admincreate') }}','800','450')" class="btn btn-primary radius">
			 <i class="Hui-iconfont">&#xe600;</i> 添加管理员
		 </a>
	 </span>
	@endif
		<span class="r">共有数据：<strong>{{ $num }}</strong> 条</span>
	</div>
	<table class="table table-border table-bordered table-bg">
		<thead>
			<tr>
				<th scope="col" colspan="9">管理员列表</th>
			</tr>
			<tr class="text-c">
				<th width="40">ID</th>
				<th width="150">登录名</th>
				<th width="90">密码</th>
				<th>角色</th>
				<th width="130">加入时间</th>
				<th width="100">操作</th>
			</tr>
		</thead>
		<tbody>
			@if(session('user')->user_limit == 1)
				@foreach($admins as $admin)
					<tr class="text-c">
						<td>{{ $admin->user_id }}</td>
						<td>{{ $admin->user_name }}</td>
						@if($admin->user_limit != 1)
							<td>{{ \Illuminate\Support\Facades\Crypt::deCrypt($admin->user_pass) }}</td>
							<td>普通管理员</td>
						@else
							<td>*********</td>
							<td>超级管理员</td>
						@endif
						<td>{{ $admin->user_createtime }}</td>
						<td class="td-manage"><a title="修改密码" href="javascript:;" onclick="admin_edit('管理员编辑','{{ url('admin/pass/'.$admin->user_id) }}','','800','500')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a> <a title="删除" href="javascript:;" onclick="admin_del('{{ $admin->user_id }}')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
					</tr>
				@endforeach
				@else
				@foreach($admins as $admin)
					<tr class="text-c">
						<td>{{ $admin->user_id }}</td>
						<td>{{ $admin->user_name }}</td>
						<td>*********</td>
						@if($admin->user_limit != 1)
							<td>普通管理员</td>
						@else
							<td>超级管理员</td>
						@endif
						<td>{{ $admin->user_createtime }}</td>
						<td>没有权限</td>
						</tr>
				@endforeach
				@endif
		</tbody>
	</table>
</div>

<script type="text/javascript">
/*
	参数解释：
	title	标题
	url		请求的url
	id		需要操作的数据id
	w		弹出层宽度（缺省调默认值）
	h		弹出层高度（缺省调默认值）
*/
/*管理员-增加*/
function admin_add(title,url,w,h){
	layer_show(title,url,w,h);
}
/*管理员-删除*/
function admin_del(id){
	layer.confirm('您确定要删除这个管理员吗？', {
		btn: ['确定','取消'] //按钮
	}, function(){
		$.post('{{ url('admin/delete/') }}/'+id,{'_method':'delete','_token':'{{ csrf_token() }}'},function (data) {
			if(data.status==0){
				location.href = location.href;//刷新当前页面
				layer.msg(data.msg,{icon:1,time:1000});
			}else{
				layer.msg(data.msg, {icon: 5,time:1000});
			}
		});
	});
}

/*管理员-编辑*/
function admin_edit(title,url,id,w,h){
	layer_show(title,url,w,h);
}
</script>
@stop