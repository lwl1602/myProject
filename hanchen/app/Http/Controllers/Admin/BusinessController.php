<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/14
 * Time: 16:22
 */
namespace App\Http\Controllers\Admin;

use App\Http\Model\Business;
use App\Http\Model\BusinessCategory;
use App\Http\Model\Laws;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class BusinessController extends CommonController{

    public function index(){
        $buses = Business::with('BusinessCategory')->get();
        $num = Business::all()->count();
        return view('admin.business.bus-list',compact('buses','num'));
    }

    //进入编辑界面
    public function show($id){
        $bus = Business::find($id);
        $bcs = BusinessCategory::all();
        return view('admin.business.bus-edit',compact('bus','bcs'));
    }
    
    //业务数据库更新
    public function edit($id){
        if($input = Input::all()) {
            $bus = Business::find($id);
            $picture = $_FILES["file-2"];
            $rules = [                      //数据验证规则
                //required： 密码不能为空  between: 密码在多少位之间控制范围 confirmed:验证是否一致
                "uploadfile" => 'required',
                "title" => 'required|between:1,20',
                "content" => 'required',
            ];
            $message = [
                'uploadfile.required' => '业务图标描述不能为空',
                'title.required' => '业务标题不能为空',
                'title.between' => '业务标题在1到20之间，不宜过长',
                'content.required' => '内容不能为空',
            ];
            $validator = Validator::make($input, $rules, $message);
            if ($validator->passes()) {       //查看数据验证是否通过
                if($picture['name']!=null){
                    $oldurl = $bus->bus_url;
                    unlink($oldurl);
                    $newurl = $this->uploadImg('busniess_photos',$picture['name'],$picture['tmp_name']);
                    $bus->bus_url = $newurl;
                }
                $bus->bus_title = $input['title'];
                $bus->bus_content = $input['content'];
                $bus->bus_html = $input['html'];
                $bus->bus_text = $input['text'];
                $bus->bus_time = date('Y-m-d');
                $bus->bc_id = $input['type'];
                $result = $bus->save();
                if ($result) {                            // 如果$result存在值的话
                    return back()->with('errors', '修改成功！')->withInput();
                } else {
                    return back()->with('errors', '请认真检查数据是否有问题，修改失败！')->withInput();
                }
            } else {
                return back()->withErrors($validator)->withInput();      //将错误信息返回到界面
            }
        }
    }

    //数据删除
    public function destroy($id){
        $res = Business::where('bus_id',$id)->delete();
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

    //进入到新闻添加列表
    public function create(){
        $bcs = BusinessCategory::all();
        return view('admin.business.bus-add',compact('bcs'));
    }
    
    //业务内容提交到数据库
    public function store(){
        if($input = Input::except('submit')){       //除了提交上来的_token意外其他的值都需要
            $picture = $_FILES["file-2"];
            $url = $this->uploadImg('busniess_photos',$picture['name'],$picture['tmp_name'] );
            $rules = [                      //数据验证规则
                //required： 密码不能为空  between: 密码在多少位之间控制范围 confirmed:验证是否一致
                "uploadfile"=>'required',
                "title"=>'required|between:1,20',
                "content"=>'required',
            ];
            $message = [
                'uploadfile.required'=>'业务图标描述不能为空',
                'title.required'=>'业务标题不能为空',
                'title.between'=>'业务标题在1到20之间，不宜过长',
                'content.required'=>'内容不能为空',
            ];
            //验证数据，$input 是要验证的数据， $rules： 是数据的验证规则  $message:  新密码不能为空
            $validator = Validator::make($input,$rules,$message);
            if($validator->passes()){       //查看数据验证是否通过
                $bus = new Business;
                $bus->bus_url = $url;
                $bus->bus_title = $input['title'];
                $bus->bus_content = $input['content'];
                $bus->bus_html = $input['html'];
                $bus->bus_text = $input['text'];
                $bus->bus_time = date('Y-m-d');
                $bus->bc_id = $input['type'];
                $result = $bus->save();
                if($result){                            // 如果$result存在值的话
                    return back()->with('errors','添加成功！')->withInput();
                }else{
                    return back()->with('errors','请认真检查数据是否有问题，添加失败！')->withInput();
                }
            }else{
                return back()->withErrors($validator)->withInput();      //将错误信息返回到界面
            }
        }else{
            return view('admin.laws.laws-add');
        }
    }


}