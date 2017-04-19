@extends('layouts.content')

@section('content')
	<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 业务领域 <span class="c-gray en">&gt;</span> 业务分类列表<a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
	<div class="page-container">
	<div class="text-c">
			<form class="Huiform" id="formid" target="_self">
				<input type="text" placeholder="请输入分类名称" value="" name="name" class="input-text" style="width:120px">
			</span><button type="button" class="btn btn-success" id="" name="" onClick="picture_colume_add(this);"><i class="Hui-iconfont">&#xe600;</i> 添加分类</button>
			</form>
	</div>
	<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"> <a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a></span> <span class="r">共有数据：<strong>{{ $num }}</strong> 条</span> </div>
	<table class="table table-border table-bordered table-hover table-bg">
		<thead>
			<tr>
				<th scope="col" colspan="6">所有业务分类</th>
			</tr>
			<tr class="text-c">
				<th width="25"><input type="checkbox" value="" name=""></th>
				<th width="40">ID</th>
				<th width="200">业务分类名</th>
				<th width="200">最近操作时间</th>
				<th width="70">操作</th>
			</tr>
		</thead>
		<tbody>
		@for($i = 0;$i < $num;$i++ )
			<tr class="text-c">
				<td><input type="checkbox" value="" name=""></td>
				<td>{{ $i+1 }}</td>
				<td>{{ $bcs[$i]->bc_name }}</td>
				<td>{{ $bcs[$i]->bc_time }}</td>
				<td class="f-14"><a title="编辑" onclick="admin_role_edit('分类名编辑','{{ url('admin/bc') }}/'+'{{ $bcs[$i]->bc_id }}','0','800','250')" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a> <a title="删除" href="javascript:;" onclick="admin_role_del(this,'{{ $bcs[$i]->bc_id }}')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
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

function picture_colume_add(obj){
	layer.confirm('确认要添加这个分类吗？',function(index){
		$.ajax({
			type: 'POST',
			url: '{{ url('admin/bc') }}',
			data:$('#formid').serialize(),// 你的formid
			async: false,
			dataType: 'json',
			success: function(data){
				if(data != null || data != ''){
					location.href = location.href;//刷新当前页面
					layer.msg(data.msg,{icon:1,time:1000});

				}
			},
			error:function(data) {
				console.log(data.msg);
			},
		});
	});
}

/*管理员-角色-删除*/
function admin_role_del(obj,id){
	layer.confirm('删除须谨慎，确认要删除吗？',function(index){
		$.ajax({
			type: 'DELETE',
			url: '{{ url('admin/bc') }}/'+id,
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