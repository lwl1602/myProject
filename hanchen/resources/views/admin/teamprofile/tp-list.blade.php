@extends('layouts.content')

@section('head')
	<link rel="stylesheet" href="{{ asset('style/lib/zTree/v3/css/zTreeStyle/zTreeStyle.css') }}" type="text/css">
	@stop
@section('content')
	<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i>关于我们 <span class="c-gray en">&gt;</span> 团队列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
	<div class="page-container">
		<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a> <a class="btn btn-primary radius" href="{{ url('admin/tp/create') }}"><i class="Hui-iconfont">&#xe600;</i> 添加成员</a></span> <span class="r">共有数据：<strong>{{ count($tps) }}</strong> 条</span> </div>
		<div class="mt-20">
			<table class="table table-border table-bordered table-bg table-hover table-sort">
				<thead>
					<tr class="text-c">
						<th width="40"><input name="" type="checkbox" value=""></th>
						<th width="40">ID</th>
						<th width="100">顾问照片</th>
						<th width="80">姓名</th>
						<th width="80">职业</th>
						<th width="100">教育背景</th>
						<th >工作经历</th>
						<th >业务范围</th>
						<th >执业范围</th>
						<th>行业兼职</th>
						<th width="100">联系电话</th>
						<th width="100">操作</th>
					</tr>
				</thead>
				@for($i = 0;$i<count($tps);$i++)
				<tbody>
					<tr class="text-c va-m">
						<td><input name="" type="checkbox" value=""></td>
						<td>{{ $i+1 }}</td>
						<td><a style="cursor:pointer" onclick="member_show('{{ $tps[$i]->tp_name }}','{{ url('admin/tp/member/'.$tps[$i]->tp_id) }}','10001','500','600')"><img width="60" height="80" src="{{ asset($tps[$i]->tp_url) }}"></a></td>
						<td class="td-status"><a style="cursor:pointer" onclick="member_show('{{ $tps[$i]->tp_name }}','{{ url('admin/tp/member/'.$tps[$i]->tp_id) }}','10001','500','600')">{{ $tps[$i]->tp_name }}</a></td>
						<td class="td-status">{{ $tps[$i]->tp_profession }}</td>
						<td class="td-status">{{ mb_substr( $tps[$i]->tp_education, 0, 50, 'utf-8' ) }}....</td>
						<td class="td-status">{{ mb_substr( $tps[$i]->tp_workexperience, 0, 50, 'utf-8' ) }}....</td>
						<td class="td-status">{{ mb_substr( $tps[$i]->tp_scope, 0, 50, 'utf-8' ) }}....</td>
						<td class="td-status">{{ mb_substr( $tps[$i]->tp_jobs, 0, 50, 'utf-8' ) }}...</td>
						<td class="td-status">{{ mb_substr( $tps[$i]->tp_parttime, 0, 50, 'utf-8' ) }}...</td>
						<td class="td-status">{{ $tps[$i]->tp_phone }}</td>
						<td class="td-manage"><a style="text-decoration:none" class="ml-5" href="{{ url('admin/tp/'.$tps[$i]->tp_id) }}" title="编辑"><i class="Hui-iconfont">&#xe6df;</i></a> <a style="text-decoration:none" class="ml-5" onClick="product_del(this,'{{ $tps[$i]->tp_id }}')" href="javascript:;" title="删除"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
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

	/*用户-查看*/
	function member_show(title,url,id,w,h){
		layer_show(title,url,w,h);
	}

/*产品-删除*/
function product_del(obj,id){
	layer.confirm('确认要删除吗？',function(index){
		$.ajax({
			type: 'DELETE',
			url: '{{ url('admin/tp') }}/'+id,
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