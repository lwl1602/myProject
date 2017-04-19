@extends('layouts.content')

@section('content')
<div class="cl pd-20" style=" background-color:#5bacb6">
	<img class="avatar size-XL l" src="{{ asset($tp->tp_url) }}">
	<dl style="margin-left:80px; color:#fff">
		<dt>
			<span class="f-18">{{ $tp->tp_name }}</span>
			<span class="pl-10 f-12">职业：{{ $tp->tp_profession }}</span>
		</dt>
		<dd class="pt-10 f-12" style="margin-left:0">{{ $tp->tp_education }}</dd>
	</dl>
</div>
<div class="pd-20">
	<table class="table">
		<tbody>
			<tr>
				<th class="text-r" width="100">联系方式：</th>
				<td>{{ $tp->tp_site }}</td>
			</tr>
			<tr>
				<th class="text-r">电话：</th>
				<td>{{ $tp->tp_phone }}</td>
			</tr>
			<tr>
				<th class="text-r">邮编：</th>
				<td>{{ $tp->tp_postcode }}</td>
			</tr>
			<tr>
				<th class="text-r">传真：</th>
				<td>{{ $tp->tp_faxes }}</td>
			</tr>
			<tr>
				<th class="text-r" width="100">工作经历：</th>
				<td>{{ $tp->tp_workexperience }}</td>
			</tr>
			<tr>
				<th class="text-r" width="100">业务范围：</th>
				<td>{{ $tp->tp_scope }}</td>
			</tr>
		</tbody>
	</table>
</div>
<!--请在下方写此页面业务相关的脚本-->
@stop