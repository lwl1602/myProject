@extends('layouts.content')

@section('content')
    <article class="page-container">
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
        <form class="form form-horizontal" id="form-admin-add" action="{{ url('admin/update') }}">
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>初始密码：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text" value="" placeholder="账号" id="adminName" name="password_o">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>新密码：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="password" class="input-text" autocomplete="off" value="" placeholder="密码" id="password" name="password">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>确认新密码：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="password" class="input-text" autocomplete="off"  placeholder="确认新密码" id="password2" name="password_confirmation">
                </div>
            </div>
            <div class="row cl">
                <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
                    <input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
                </div>
            </div>
        </form>
    </article>
@stop