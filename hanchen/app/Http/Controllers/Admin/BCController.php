<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/14
 * Time: 16:22
 */
namespace App\Http\Controllers\Admin;

use App\Http\Model\BusinessCategory;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class BCController extends CommonController{

    public function index(){
        $bcs = BusinessCategory::all();
        $num = BusinessCategory::all()->count();
        return view('admin.businesscategory.bc-list',compact('bcs','num'));
    }

    //进入编辑界面
    public function show($id){
        $bc = BusinessCategory::find($id);
        return view('admin.businesscategory.bc-edit',compact('bc'));
    }
    
    //新闻数据库更新
    public function edit($id){
        $input = Input::all();
        if($input['name'] != null || $input['name'] != ""){
            $count = BusinessCategory::where('bc_name',$input['name'])->get()->count();
            if($count == 0){
                $bc = BusinessCategory::find($id);
                $bc->bc_name = $input['name'];
                $bc->bc_time = date('Y-m-d H:i:s');
                $res = $bc->update();
                if($res){
                    return back()->with('errors','更新成功');
                }else{
                    return back()->with('errors','更新失败，请稍后重试');
                }
            }else{
                return back()->with('errors','更新失败，该分类已经存在');
            }
        }else{
            return back()->with('errors','提交内容不能为空');
        }

    }

    //数据删除
    public function destroy($id){
        $res = BusinessCategory::where('bc_id',$id)->delete();
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
    
    public function store(){
        if($input = Input::all()){       //除了提交上来的_token意外其他的值都需要
                $bc = new BusinessCategory;
                $count = BusinessCategory::where('bc_name',$input['name'])->get()->count();
                if($count == 0){
                    $bc->bc_name = $input['name'];
                    $bc->bc_time = date('Y-m-d H:i:s');
                    $result = $bc->save();
                    if($result){                            // 如果$result存在值的话
                        $data = [
                            'status' => 0,
                            'msg' => '添加成功！',
                        ];
                    }else{
                        $data = [
                            'status' => 0,
                            'msg' => '添加失败！',
                        ];
                    }
                }else{
                    $data = [
                        'status' => 0,
                        'msg' => '添加失败，这个分类已经存在了',
                    ];
                }
            } else{
            $data = [
                'status' => 1,
                'msg' => '添加失败，输入框没有任何内容！',
            ];
        }
        return $data;
    }


}