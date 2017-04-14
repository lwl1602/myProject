@extends('layouts.content')

@section('content')
<div class="page-container">
	@if(count($errors) > 0)
		<div class="cl pd-5 bg-1 bk-gray mt-20">
			@if(is_object($errors))
				@foreach($errors->all() as $error)
					<p style="color: red">{{ $error }}</p>
				@endforeach
			@else
				<p style="color: red">{{ $errors }}</p>
			@endif
		</div>
	@endif
	<div class="cl pd-5 bg-1 bk-gray mt-20"><span class="l"><a class="btn btn-secondary radius" href="{{ url('admin/index/show') }}">返回主页</a></span><span class="r">共有数据：<strong>{{ $pic_num }}</strong> 条</span> </div>
	<div class="portfolio-content">
		<ul class="cl portfolio-area">
			@foreach($pictures as $pic)
			<li class="item">
				<div class="portfoliobox">
					<input class="checkbox" name="index" type="radio" value="{{ $pic->img_id }}" @if($pic->img_type == 1) checked @endif >
					<div class="picbox"><img src="{{ asset($pic->img_path) }}"></div>
					<div class="textbox">{{ $pic->img_intro }} </div>
				</div>
			</li>
			@endforeach
		</ul>
	</div>
		<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"> <a href="javascript:;" onclick="change_type()" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe6df;</i> 设置为背景图</a></span></div>
</div>

<script type="text/javascript" src="{{ asset('style/lib/lightbox2/2.8.1/js/lightbox.min.js') }}"></script>
<script type="text/javascript">
	function change_type(){
		var id = $('input:radio:checked').val();
		alert(id);
		layer.confirm('您确定要把这个图片改成主页面背景图吗？', {
			btn: ['确定','取消'] //按钮
		}, function(){
			$.post('{{ url('admin/index/edittype') }}/'+id,{'_token':'{{ csrf_token() }}'},function (data) {
				if(data.status==0){
					location.href = location.href;//刷新当前页面
					layer.msg(data.msg,{icon:1,time:1000});
				}else{
					layer.msg(data.msg, {icon: 5,time:1000});
				}
			});
		});
	}

$(function(){
	$.Huihover(".portfolio-area li");
});
</script>
@stop