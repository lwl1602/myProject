<?php

namespace App\Http\Controllers\Admin;
use App\Http\Model\Category;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

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
    
    public function changeorder(){              //改变排序cate_pid
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

    //post请求  使用admin/category自动调用  添加分类提交
    public function store(){
        if($input = Input::except('_token')){       //除了提交上来的_token意外其他的值都需要
            $rules = [                      //数据验证规则
                //required： 密码不能为空  between: 密码在多少位之间控制范围 confirmed:验证是否一致
                "cate_name"=>'required',
            ];
            $message = [
                'cate_name.required'=>'分类名称不能为空',
            ];
            //验证数据，$input 是要验证的数据， $rules： 是数据的验证规则  $message:  新密码不能为空
            $validator = Validator::make($input,$rules,$message);
            if($validator->passes()){       //查看数据验证是否通过
                $result = Category::create($input);   //将input中的数据存入到数据库中，注意前面要排除数据
                if($result){                            // 如果$result存在值的话
                    return redirect('admin/category');
                }else{
                    return back()->with('errors','请认真检查数据是否有问题，添加失败！');
                }
            }else{
                return back()->withErrors($validator);      //将错误信息返回到界面
            }
        }else{
            return view('admin.category.add');
        }
    }

    //get请求  使用admin/category/create自动调用    添加分类
    public function create(){
        $data = Category::where('cate_pid',0)->get();
        return view('admin.category.add',compact('data'));  //compact() 返回输出的数组，包含了添加的所有变量。
    }

    //get请求  使用admin/category/{categoty}自动调用    显示单个分类
    public function show(){

    }

    //delete请求  使用admin/category/{categoty}自动调用 删除单个分类
    public function destroy($cate_id){
        $result = Category::where('cate_id',$cate_id)->delete();
        Category::where('cate_pid',$cate_id)->update(['cate_pid'=>0]);
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

    //get请求  使用admin/category/{categoty}/edit自动调用   编辑分类
    public function edit($cate_id){
        $file = Category::find($cate_id);
        $data = Category::where('cate_pid',0)->get();
        return view('admin.category.edit',compact('file','data'));
    }

    //put请求  使用admin/category/{categoty}自动调用    更新分类
    public function update($cate_id){
        $input = Input::except('_token','_method');
        $result = Category::where('cate_id',$cate_id)->update($input);
        if($result){
            return redirect('admin/category');
        }else{
            return back()->with('errors','更新失败，请稍后重试');
        }
    }

}
