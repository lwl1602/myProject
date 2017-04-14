<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;

class IndexController extends CommonController
{
    public function index(){
        return view('admin.index');
    }

    public function info(){
        return view('admin.info');
    }
    
    //管理员列表
    public function adminList(){
        $admins = User::all();
        $num = User::all()->count();
        return view('admin.admin-list',compact('admins','num'));
    }

    //添加管理员
    public function adminCreate(){
        return view('admin.admin-add');
    }
    
    //添加管理员提交
    public function store(){
        if($input = Input::all()){
            $rules = [
                "username"=>'required|between:5,20',
                "password"=>'required|between:6,20|confirmed',
            ];
            $message = [
                "username.required" => '账号不能为空',
                "username.between" => '账号必须在5到20位之间',
                'password.required'=>'密码不能为空',
                'password.between'=>'密码必须在6到20位之间',
                'password.confirmed'=>'密码和确认密码不一致',
            ];
            $validator = Validator::make($input,$rules,$message);
            if($validator->passes()){
                if(User::where('user_name',$input['username'])->count() == 0){
                    $admin = new User;
                    $admin->user_name = $input['username'];
                    $admin->user_pass = Crypt::encrypt($input['password']);
                    $admin->user_limit = $input['limit'];
                    $admin->user_createtime = date('Y-m-d H:i:s');
                    $result = $admin->save();
                    if($result){                            // 如果$result存在值的话
                        return back()->with("errors",'添加成功');
                    }else{
                        return back()->with('errors','请认真检查数据是否有问题，添加失败！')->withInput();
                    }
                }else{
                    return back()->with('errors','该账号已存在，请重新输入！')->withInput();
                }
            }else{
                return back()->withErrors($validator)->withInput();      //将错误信息返回到界面
            }
        }
    }
    public function delete($user_id){
        $result = User::where('user_id',$user_id)->delete();
        if($result){
            $data = [
                'status' => 0,
                'msg' => '分类删除成功！',
            ];
        }else{
            $data = [
                'status' => 1,
                'msg' => '分类删除失败，请稍后重试！',
            ];
        }
        return $data;
    }
    //修改密码
    public function pass($user_id){
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
                $user = User::find($user_id);
                $passowrd = Crypt::decrypt($user->user_pass);
                if($input['password_o'] == $passowrd){
                    $user->user_pass = Crypt::encrypt($input['password']);
                    $user->update();
                    return back()->with('errors','密码修改成功');
                }else{
                    return back()->with('errors','输入初始密码与原密码不匹配')->withInput();
                }
            }else{
                return redirect()->back()->withErrors($validator)->withInput();      //将错误信息返回到界面
            }
        }else{
            return view('admin.admin-pass');
        }
    }

}
