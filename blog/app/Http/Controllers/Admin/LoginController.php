<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;

require_once 'E:/mygit/myProject/blog/resources/org/code/Code.class.php';

class LoginController extends CommonController
{
    public function login(){

        if($input = Input::all()){//Input::all() 是否提交了数据
            $code = new \Code;
            $code->get();
            if($input['code'] != $code){
                return back()->with('msg','验证码错误');      //返回到请求页面,后面加with调教验证码
            }

        }else{
            return view('admin.login');
        }
    }

    public function code(){
        $code = new \Code;
        $code->make();
    }

}

