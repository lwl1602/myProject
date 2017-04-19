<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/14
 * Time: 16:22
 */
namespace App\Http\Controllers\Admin;

use App\Http\Model\TeamProfile;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class TeamProfileController extends CommonController{

    public function index(){
        $tps = TeamProfile::all();
        return view('admin.teamprofile.tp-list',compact('tps'));
    }

    //进入编辑界面
    public function show($id){
        $tp = TeamProfile::find($id);
        return view('admin.teamprofile.tp-edit',compact('tp'));
    }
    
    //业务数据库更新
    public function edit($id){
        if($input = Input::all()) {
            $tp = TeamProfile::find($id);
            $picture = $_FILES["file-2"];
            $rules = [                      //数据验证规则
                "name"=>'required',
                "uploadfile"=>'required',
                "profession"=>'required',
                "education"=>'required|between:1,50',
                "workexperience"=>'required',
                "scope"=>'required',
                "jobs"=>'required',
                "parttime"=>'required',
            ];
            $message = [
                'name.required'=>'提交时姓名不能为空',
                'uploadfile.required'=>'提交时照片不能为空',
                'profession.required'=>'提交时职业不能为空',
                'education.required'=>'提交时学历不能为空',
                'workexperience.required'=>'提交时工作经历不能为空',
                'scope.required'=>'提交时业务范围不能为空',
                'jobs.required'=>'提交时职业范围不能为空',
                'parttime.required'=>'提交时行业兼职不能为空',
                'education.between'=>'提交时描述学历不能超过100字',
            ];
            $validator = Validator::make($input, $rules, $message);
            if ($validator->passes()) {       //查看数据验证是否通过
                if($picture['name']!=null){
                    $oldurl = $tp->tp_url;
                    unlink($oldurl);
                    $newurl = $this->uploadImg('tp_photos',$picture['name'],$picture['tmp_name']);
                    $tp->tp_url = $newurl;
                }
                $tp->tp_name = $input['name'];
                $tp->tp_profession = $input['profession'];
                $tp->tp_education = $input['education'];
                $tp->tp_workexperience = $input['workexperience'];
                $tp->tp_scope = $input['scope'];
                $tp->tp_jobs = $input['jobs'];
                $tp->tp_parttime = $input['parttime'];
                $tp->tp_site = $input['site'];
                $tp->tp_postcode= $input['postcode'];
                $tp->tp_phone = $input['phone'];
                $tp->tp_faxes = $input['faxes'];
                $result = $tp->save();
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
        $res = TeamProfile::where('tp_id',$id)->delete();
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
        return view('admin.teamprofile.tp-add');
    }

    public function member($id){
        $tp = TeamProfile::find($id);
        return view('admin.teamprofile.member-show',compact('tp'));
    }

    //业务内容提交到数据库
    public function store(){
        if($input = Input::except('submit')){       //除了提交上来的_token意外其他的值都需要
            $picture = $_FILES['file-2'];
            $url = $this->uploadImg('tp_photos',$picture['name'],$picture['tmp_name'] );
            $rules = [                      //数据验证规则
                "name"=>'required',
                "uploadfile"=>'required',
                "profession"=>'required',
                "education"=>'required|between:1,50',
                "workexperience"=>'required',
                "scope"=>'required',
                "jobs"=>'required',
                "parttime"=>'required',
            ];
            $message = [
                'name.required'=>'姓名不能为空',
                'uploadfile.required'=>'照片不能为空',
                'profession.required'=>'职业不能为空',
                'education.required'=>'学历不能为空',
                'workexperience.required'=>'工作经历不能为空',
                'scope.required'=>'业务范围不能为空',
                'jobs.required'=>'职业范围不能为空',
                'parttime.required'=>'行业兼职不能为空',
                'education.between'=>'描述学历不能超过100字',
            ];
            //验证数据，$input 是要验证的数据， $rules： 是数据的验证规则  $message:  新密码不能为空
            $validator = Validator::make($input,$rules,$message);
            if($validator->passes()){       //查看数据验证是否通过
                $tp = new TeamProfile;
                $tp->tp_url = $url;
                $tp->tp_name = $input['name'];
                $tp->tp_profession = $input['profession'];
                $tp->tp_education = $input['education'];
                $tp->tp_workexperience = $input['workexperience'];
                $tp->tp_scope = $input['scope'];
                $tp->tp_jobs = $input['jobs'];
                $tp->tp_parttime = $input['parttime'];
                if($input['site']!=null){
                    $tp->tp_site = $input['site'];
                }
                if($input['postcode']!=null){
                    $tp->tp_postcode= $input['postcode'];
                }
                if($input['phone']!=null){
                    $tp->tp_phone = $input['phone'];
                }
                if($input['faxes']!=null){
                    $tp->tp_faxes = $input['faxes'];
                }
                $result = $tp->save();
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