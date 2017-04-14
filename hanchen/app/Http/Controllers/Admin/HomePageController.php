<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Picture;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;

class HomePageController extends CommonController
{
    //首页背景图操作
    public function add(){
        return view('admin.index.picture-add');
    }
    
    //添加图片
    public function create(){
        if($input = Input::all()){
            for ($i = 0;$i < count($input['img']);$i++){
                $picture = new Picture;
                if($input['img_intro']!=null){
                    $picture->img_intro = $input['img_intro'];
                }
                $picture->img_path = $input['img'][$i];
                $picture->img_time = date('Y-m-d H:i:s');
                $result = $picture->save();
            }
            if($result){                            // 如果$result存在值的话
                return back()->with("errors",'添加成功');
            }else{
                return back()->with('errors','请认真检查数据是否有问题，添加失败！')->withInput();
            }
        }else{
            return back()->with("errors",'提交失败，请查看是否其它原因导致');
        }
    }

    //显示所有图片
    public function show(){
        $pictures = Picture::get();
        $pic_num = Picture::get()->count();
        return view('admin.index.picture-list',compact('pictures','pic_num'));
    }

    //设置主页的显示
    public function showImage(){
        $pictures = Picture::get();
        $pic_num = Picture::get()->count();
        return view('admin.index.picture-edittype',compact('pictures','pic_num'));
    }

    //设置主页面
    public function editType($id){
        $pictures = Picture::get();
        foreach ($pictures as $pic){
            if($pic->img_id == $id){
                $pic->img_type = 1;
                $pic->save();
            }else if($pic->img_id != $id && $pic->img_type == 1){
                $pic->img_type = 2;
                $pic->save();
            }
        }
        $data = [
            'status' => 0,
            'msg' => '修改成功！',
        ];
        return $data;
    }

    public function update(){
       
    }

    //删除图片
    public function destroy($id){
        $pic = Picture::find($id);
        if($pic->img_type == 1){
            $data = [
                'status' => 0,
                'msg' => '删除失败，当前图片为主界面图片！',
            ];
        }else{
            $res = Picture::where('img_id',$id)->delete();
            if($res){
                unlink($pic->img_path);
                $data = [
                    'status' => 0,
                    'msg' => '删除成功！',
                ];
            }else{
                $data = [
                    'status' => 0,
                    'msg' => '删除失败,请查看时候数据存在问题！',
                ];
            }
        }
        return $data;
    }
}
