@extends('layouts.content')

@section('head')
	<link rel="stylesheet" href="{{ asset('style/lib/zTree/v3/css/zTreeStyle/zTreeStyle.css') }}" type="text/css">
	@stop
@section('content')
	<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i>产品管理 <span class="c-gray en">&gt;</span> 产品列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
	<div class="page-container">
		<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a> <a class="btn btn-primary radius" href="{{ url('admin/bus/create') }}"><i class="Hui-iconfont">&#xe600;</i> 添加产品</a></span> <span class="r">共有数据：<strong>{{ $num }}</strong> 条</span> </div>
		<div class="mt-20">
			<table class="table table-border table-bordered table-bg table-hover table-sort">
				<thead>
					<tr class="text-c">
						<th width="40"><input name="" type="checkbox" value=""></th>
						<th width="40">ID</th>
						<th width="160">业务图片</th>
						<th width="100">业务名称</th>
						<th>业务内容</th>
						<th width="150">业务类型</th>
						<th width="100">发布时间</th>
						<th width="100">操作</th>
					</tr>
				</thead>
				@for($i = 0;$i<$num;$i++)
				<tbody>
					<tr class="text-c va-m">
						<td><input name="" type="checkbox" value=""></td>
						<td>{{ $i+1 }}</td>
						<td><img width="150" height="100" class="product-thumb" src="{{ asset($buses[$i]->bus_url) }}"></td>
						<td class="text-l">{{ $buses[$i]->bus_title }}</td>
						<td class="text-l">{{ mb_substr( $buses[$i]->bus_text, 0, 100, 'utf-8' ) }}....</td>
						<td class="td-status">{{ $buses[$i]['BusinessCategory']->bc_name }}</td>
						<td class="td-status">{{ $buses[$i]->bus_time }}</td>
						<td class="td-manage"><a style="text-decoration:none" class="ml-5" href="{{ url('admin/bus/'.$buses[$i]->bus_id) }}" title="编辑"><i class="Hui-iconfont">&#xe6df;</i></a> <a style="text-decoration:none" class="ml-5" onClick="product_del(this,'{{ $buses[$i]->bus_id }}')" href="javascript:;" title="删除"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
					</tr>
				</tbody>
					@endfor
			</table>
		</div>
	</div>

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="{{ asset('style/lib/zTree/v3/js/jquery.ztree.all-3.5.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('style/lib/My97DatePicker/4.8/WdatePicker.js') }}"></script>
<script type="text/javascript" src="{{ asset('style/lib/datatables/1.10.0/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('style/lib/laypage/1.2/laypage.js') }}"></script>
<script type="text/javascript">

/*产品-删除*/
function product_del(obj,id){
	layer.confirm('确认要删除吗？',function(index){
		$.ajax({
			type: 'DELETE',
			url: '{{ url('admin/bus') }}/'+id,
			dataType: 'json',
			success: function(data){
				$(obj).parents("tr").remove();
				layer.msg(data.msg,{icon:1,time:1000});
			},
			error:function(data) {
				console.log(data.msg);
				layer.msg(data.msg,{icon:5,time:1000});
			},
		});		
	});
}
</script>
@stop