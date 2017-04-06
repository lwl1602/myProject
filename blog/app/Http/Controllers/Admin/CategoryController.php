<?php

namespace App\Http\Controllers\Admin;
use App\Http\Model\Category;
use Illuminate\Support\Facades\Input;

/**
 * Class CategoryController
 * @package App\Http\Controllers\Admin
 *
 * categoryController 用的是resource写的路由，所以自带有一些方法
 * 想要查看那些方法可以使用命令  php artisan route:list
 *
 */
class CategoryController extends CommonController
{

    //get请求  使用admin/category自动调用   全部分类列表
    public function index(){
        $categorys = (new Category())->tree();
        return view('admin.category.index')->with('date',$categorys);
    }
    
    public function changeorder(){
        $input = Input::all();
        $cate = Category::find($input['cate_id']);
        $cate->cate_order = $input['cate_order'];
        $re = $cate->update();
        if($re){
            $data = [
                'status' => 0,
                'msg' => '分类排序更新成功！',
            ];
        }else{
            $data = [
                'status' => 1,
                'msg' => '分类排序更新失败，请稍后重试！',
            ];
        }
        return $data;
    }

    //post请求  使用admin/category自动调用
    public function store(){

    }

    //get请求  使用admin/category/create自动调用    添加分类
    public function create(){

    }

    //get请求  使用admin/category/{categoty}自动调用    显示单个分类
    public function show(){

    }

    //put请求  使用admin/category/{categoty}自动调用    更新分类
    public function update(){
        
    }

    //delete请求  使用admin/category/{categoty}自动调用 删除单个分类
    public function destroy(){
        echo 'delete';
    }

    //get请求  使用admin/category/{categoty}/edit自动调用   编辑分类
    public function edit($cate_id){
        echo $cate_id;
    }

}
