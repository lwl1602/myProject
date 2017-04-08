<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;


class IndexController extends CommonController
{
    public function index(){
        return view('admin.index');
    }

    public function info(){
        return view('admin.info');
    }

    //修改密码
    public function pass(){
        if($input = Input::all()){
            $rules = [                      //数据验证规则
                //required： 密码不能为空  between: 密码在多少位之间控制范围 confirmed:验证是否一致
                "password"=>'required|between:6,20|confirmed',
            ];
            $message = [
                'password.required'=>'新密码不能为空',
                'password.between'=>'密码必须在6到20位之间',
                'password.confirmed'=>'新密码和确认密码不一致',
            ];
            //验证数据，$input 是要验证的数据， $rules： 是数据的验证规则  $message:  新密码不能为空
            $validator = Validator::make($input,$rules,$message);
            if($validator->passes()){       //查看数据验证是否通过
                $user = User::first();
                $passowrd = Crypt::decrypt($user->user_pass);
                if($input['password_o'] == $passowrd){
                    $user->user_pass = Crypt::encrypt($input['password']);
                    $user->update();
                    return back()->with('errors','密码修改成功');
                }else{
                    return back()->with('errors','输入的原密码不匹配');
                }
            }else{
                return back()->withErrors($validator);      //将错误信息返回到界面
            }
        }else{
            return view('admin.pass');
        }
    }

}
