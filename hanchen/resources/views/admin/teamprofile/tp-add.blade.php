@extends('layouts.content')

@section('content')
    <nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i>关于我们 <span class="c-gray en">&gt;</span> 添加成员 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
    <div class="page-container">
        @if(count($errors) > 0)
            <div class="Huialert Huialert-danger">
                @if(is_object($errors))
                    @foreach($errors->all() as $error)
                        <i class="icon-remove"></i>&nbsp;&nbsp;*{{ $error }}
                    @endforeach
                @else
                    <i class="icon-remove"></i>{{ $errors }}
                @endif
            </div>
        @endif
	<form class="form form-horizontal" id="form-article-add" action="{{ url('admin/tp') }}" method="post" enctype="multipart/form-data">
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>姓名：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="{{ old('name') }}" placeholder="" id="" name="name">
			</div>
		</div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>照片：</label>
            <div class="formControls col-xs-8 col-sm-9">
				<span class="btn-upload form-group">
				<input class="input-text upload-url" type="text" value="{{ old('uploadfile') }}" name="uploadfile" id="uploadfile" readonly placeholder="业务的点击图标" style="width:200px">
				<a href="javascript:void();" class="btn btn-primary radius upload-btn"><i class="Hui-iconfont">&#xe642;</i> 浏览文件</a>
				<input type="file" name="file-2" id="file-2" class="input-file">
				</span>
            </div>
        </div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>职业：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="{{ old('profession') }}" placeholder="" id="" name="profession">
			</div>
		</div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>教育背景：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="{{ old('education') }}" placeholder="" id="" name="education">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>工作经历：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <textarea name="workexperience" cols="" rows="" class="textarea"  placeholder="说点什么...最少输入10个字符" datatype="*10-100" dragonfly="true" nullmsg="备注不能为空！" onKeyUp="$.Huitextarealength(this,200)">{{ old('workexperience') }}</textarea>
                <p class="textarea-numberbar"><em class="textarea-length">0</em>/200</p>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>业务范围：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <textarea name="scope" cols="" rows="" class="textarea"  placeholder="说点什么...最少输入10个字符" datatype="*10-100" dragonfly="true" nullmsg="备注不能为空！" onKeyUp="$.Huitextarealength(this,200)">{{ old('scope') }}</textarea>
                <p class="textarea-numberbar"><em class="textarea-length">0</em>/200</p>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>执业范围：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <textarea name="jobs" cols="" rows="" class="textarea"  placeholder="说点什么...最少输入10个字符" datatype="*10-100" dragonfly="true" nullmsg="备注不能为空！" onKeyUp="$.Huitextarealength(this,300)">{{ old('jobs') }}</textarea>
                <p class="textarea-numberbar"><em class="textarea-length">0</em>/300</p>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>行业兼职：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <textarea name="parttime" cols="" rows="" class="textarea"  placeholder="说点什么...最少输入10个字符" datatype="*10-100" dragonfly="true" nullmsg="备注不能为空！" onKeyUp="$.Huitextarealength(this,300)">{{ old('parttime') }}</textarea>
                <p class="textarea-numberbar"><em class="textarea-length">0</em>/300</p>
            </div>
        </div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">地址：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="{{ old('site') }}" placeholder="" id="" name="site">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">邮编：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="{{ old('postcode') }}" placeholder="" id="" name="postcode">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">电话：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="{{ old('phone') }}" placeholder="" id="" name="phone">
			</div>
		</div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">传真：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="{{ old('faxes') }}" placeholder="" id="" name="faxes">
            </div>
        </div>
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
                <a class="btn btn-primary radius" href="{{ url('admin/tp') }}" name="submit">&nbsp;返&nbsp;回&nbsp;列&nbsp;表&nbsp;</a>
                <input class="btn btn-primary radius" type="submit" name="submit" value="&nbsp;提&nbsp;&nbsp;交&nbsp;">
            </div>
		</div>
	</form>
</div>

    <script type="text/javascript" src="{{ asset('style/lib/jquery.validation/1.14.0/jquery.validate.js') }}"></script>
    <script type="text/javascript" src="{{ asset('style/lib/jquery.validation/1.14.0/validate-methods.js') }}"></script>
    <script type="text/javascript" src="{{ asset('style/lib/jquery.validation/1.14.0/messages_zh.js') }}"></script>

@stop