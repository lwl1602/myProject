<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/14
 * Time: 10:43
 */
namespace App\Http\Controllers\Admin;

use App\Http\Model\Link;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class LinkController extends CommonController{

    //主页列表
    public function index(){
        $links = Link::get();
        $num = Link::get()->count();
        return view('admin.link.link-list',compact('links','num'));
    }
    
    //进入添加页面
    public function create(){
        return view('admin.link.link-add');
    }

    //提交链接数据到数据库
    public function store(){
        if($input = Input::except('_token')){       //除了提交上来的_token意外其他的值都需要
            $rules = [                      //数据验证规则
                //required： 密码不能为空  between: 密码在多少位之间控制范围 confirmed:验证是否一致
                "link_name"=>'required',
                "link_url"=>'required',
            ];
            $message = [
                'link_name.required'=>'链接名不能为空',
                'link_url.required'=>'链接地址不能为空',
            ];
            //验证数据，$input 是要验证的数据， $rules： 是数据的验证规则  $message:  新密码不能为空
            $validator = Validator::make($input,$rules,$message);
            if($validator->passes()){       //查看数据验证是否通过
                $result = Link::create($input);   //将input中的数据存入到数据库中，注意前面要排除数据
                if($result){                            // 如果$result存在值的话
                    return back()->with('errors','添加成功！')->withInput();
                }else{
                    return back()->with('errors','请认真检查数据是否有问题，添加失败！')->withInput();
                }
            }else{
                return back()->withErrors($validator)->withInput();      //将错误信息返回到界面
            }
        }else{
            return view('admin.link.link-add');
        }
    }


    //进入到编辑界面
    public function show($id){
        $link = Link::find($id);
        return view('admin.link.link-edit',compact('link'));
    }

    //编辑数据提交
    public function edit($id){
        $input = Input::all();
        $res = Link::where('link_id',$id)->update($input);
        if($res){
            return back()->with('errors','更新成功');
        }else{
            return back()->with('errors','更新失败，请稍后重试');
        }
    }

    public function destroy($id){
        $res = Link::where('link_id',$id)->delete();
        if($res){
            $data = [
                'status' => 0,
                'msg' => '删除成功！',
            ];
        }else{
            $data = [
                'status' => 1,
                'msg' => '删除失败，请稍后重试！',
            ];
        }
        return $data;
    }
    
    
    
}
