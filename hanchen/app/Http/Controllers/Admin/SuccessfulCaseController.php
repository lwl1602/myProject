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
use App\Http\Model\SuccessfulCase;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class SuccessfulCaseController extends CommonController{

    public function index(){
        $scs = SuccessfulCase::with('BusinessCategory')->get();
        $num = SuccessfulCase::all()->count();
        return view('admin.successfulcase.sc-list',compact('scs','num'));
    }

    //进入编辑界面
    public function show($id){
        $sc = SuccessfulCase::find($id);
        $bcs = BusinessCategory::all();
        return view('admin.successfulcase.sc-edit',compact('sc','bcs'));
    }
    
    //业务数据库更新
    public function edit($id){
        if($input = Input::all()) {
            $sc = SuccessfulCase::find($id);
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
                    $oldurl = $sc->sc_url;
                    unlink($oldurl);
                    $newurl = $this->uploadImg('sc_photos',$picture['name'],$picture['tmp_name']);
                    $sc->sc_url = $newurl;
                }
                $sc->sc_title = $input['title'];
                $sc->sc_content = $input['content'];
                $sc->sc_html = $input['html'];
                $sc->sc_text = $input['text'];
                $sc->sc_time = date('Y-m-d');
                $sc->bc_id = $input['type'];
                $result = $sc->save();
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
        $res = SuccessfulCase::where('sc_id',$id)->delete();
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
        return view('admin.successfulcase.sc-add',compact('bcs'));
    }

    //业务内容提交到数据库
    public function store(){
        if($input = Input::except('submit')){       //除了提交上来的_token意外其他的值都需要
            $picture = $_FILES["file-2"];
            $url = $this->uploadImg('sc_photos',$picture['name'],$picture['tmp_name'] );
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
                $sc = new SuccessfulCase;
                $sc->sc_url = $url;
                $sc->sc_title = $input['title'];
                $sc->sc_content = $input['content'];
                $sc->sc_html = $input['html'];
                $sc->sc_text = $input['text'];
                $sc->sc_time = date('Y-m-d');
                $sc->bc_id = $input['type'];
                $result = $sc->save();
                if($result){                            // 如果$result存在值的话
                    return back()->with('errors','添加成功！')->withInput();
                }else{
                    return back()->with('errors','请认真检查数据是否有问题，添加失败！')->withInput();
                }
            }else{
                return back()->withErrors($validator)->withInput();      //将错误信息返回到界面
            }
        }else{
            return view('admin.successfulcase.sc-add');
        }
    }


}