<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/19
 * Time: 10:48
 */
namespace App\Http\Controllers\Admin;

use App\Http\Model\Contact;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class ContactController extends CommonController{
    
    public function index(){
        $contact = Contact::first();
        return view('admin.contact.contact-edit',compact('contact'));
    }
    
    public function edit(){
        if($input = Input::all()) {
            $cp = CompanyProfile::first();
            $picture = $_FILES["file-2"];
            $rules = [                      //数据验证规则
                //required： 密码不能为空  between: 密码在多少位之间控制范围 confirmed:验证是否一致
                "uploadfile" => 'required',
                "content" => 'required',
            ];
            $message = [
                'uploadfile.required' => '业务图标描述不能为空',
                'content.required' => '内容不能为空',
            ];
            $validator = Validator::make($input, $rules, $message);
            if ($validator->passes()) {       //查看数据验证是否通过
                if($picture['name']!=null){
                    $oldurl = $cp->cp_url;
                    unlink($oldurl);
                    $newurl = $this->uploadImg('companyprofile_photos',$picture['name'],$picture['tmp_name']);
                    $cp->cp_url = $newurl;
                }
                $cp->cp_content = $input['content'];
                $cp->cp_html = $input['html'];
                $cp->cp_text = $input['text'];
                $cp->cp_time = date('Y-m-d');
                $result = $cp->save();
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
    
}