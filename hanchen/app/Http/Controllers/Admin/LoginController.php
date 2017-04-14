<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\User;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;

require_once 'E:/mygit/myProject/blog/resources/org/code/Code.class.php';

class LoginController extends CommonController
{
    public function login(){

        if($input = Input::all()){//Input::all() 是否提交了数据
            $code = new \Code;
            $_code = $code->get();
            if(strtoupper($input['code']) != $_code){
                return back()->with('msg','验证码错误');      //返回到请求页面,后面加with调教验证码
            }
            if($user = User::where('user_name',$input['user_name'])->first()){
                if(Crypt::decrypt($user->user_pass)!= $input['user_pass']){
                    return back()->with('msg','用户名或者密码错误！');
                }
            }
            session(['user'=>$user]);
            return redirect('admin/index');
        }else{
            //dd($_SERVER); 查看电脑配置信息
            return view('admin.login');
        }
    }

    public function quit(){
        session(['user'=>null]);
        return redirect('admin/login');
    }

    public function code(){
        $code = new \Code;
        $code->make();
    }

}

