@extends('layouts.content')

@section('content')
	<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页管理 <span class="c-gray en">&gt;</span> 管理员列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
	<div class="page-container">
	<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a class="btn btn-secondary radius" href="{{ url('admin/index/showimg') }}">设置主页图片</a>&nbsp;&nbsp;<a class="btn btn-primary radius" href="{{ url('admin/index/addimg') }}"><i class="Hui-iconfont">&#xe600;</i> 添加图片</a></span> <span class="r">共有数据：<strong>{{ $pic_num }}</strong> 条</span> </div>
	<div class="mt-20">
		<table class="table table-border table-bordered table-bg table-hover table-sort">
			<thead>
				<tr class="text-c">
					<th width="80">ID</th>
					<th width="100">封面</th>
					<th>图片简介</th>
					<th width="150">发布时间</th>
					<th width="100">操作</th>
				</tr>
			</thead>
			<tbody>
				@for($i = 0;$i < count($pictures); $i++ )
				<tr class="text-c">
					<td>00{{ $i+1 }}</td>
					<td><img width="210" class="picture-thumb" src="{{ asset($pictures[$i]->img_path) }}"></td>
					<td class="text-l">{{ $pictures[$i]->img_intro }}</td>
					<td>{{ $pictures[$i]->img_time }}</td>
					<td class="td-manage"><a style="text-decoration:none" class="ml-5" onClick="picture_del(this,'{{ $pictures[$i]->img_id }}')" href="javascript:;" title="删除"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
				</tr>
					@endfor
			</tbody>
		</table>
	</div>
</div>

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="{{ asset('style/lib/My97DatePicker/4.8/WdatePicker.js') }}"></script>
<script type="text/javascript" src="{{ asset('style/lib/datatables/1.10.0/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('style/lib/laypage/1.2/laypage.js') }}"></script>
<script type="text/javascript">
$('.table-sort').dataTable({
	"aaSorting": [[ 1, "desc" ]],//默认第几个排序
	"bStateSave": true,//状态保存
	"aoColumnDefs": [
	  //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
	  {"orderable":false,"aTargets":[0,8]}// 制定列不参与排序
	]
});

/*图片-删除*/
function picture_del(obj,id){
	layer.confirm('确认要删除吗？',function(index){
		$.ajax({
			type: 'POST',
			url: '{{ url('admin/index/delete') }}/'+id,
			dataType: 'json',
			success: function(data){
				$(obj).parents("tr").remove();
				layer.msg(data.msg,{icon:1,time:1000});
			},
			error:function(data) {
				layer.msg(data.msg,{icon:5,time:1000});
			},
		});		
	});
}
</script>
@stop