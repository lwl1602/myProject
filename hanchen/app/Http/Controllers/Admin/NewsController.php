<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/14
 * Time: 16:22
 */
namespace App\Http\Controllers\Admin;

use App\Http\Model\News;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class NewsController extends CommonController{
    
    public function index(){
        $newses = News::all();
        /*$content=str_replace(array("\n","\r","\t"),"",$newses[0]['news_content']);
        dd(html_entity_decode($content));*/
        $num = News::all()->count();
        return view('admin.news.news-list',compact('newses','num'));
    }

    //进入编辑界面
    public function show($id){
        $news = News::find($id);
        return view('admin.news.news-edit',compact('news'));
    }

    public function demo(){
        return view('admin.news.demo');
    }

    //新闻数据库更新
    public function edit($id){
        $input = Input::all();
        $news = News::find($id);
        $news->news_title = $input['title'];
        $news->news_content = $input['content'];
        $news->news_html = $input['html'];
        $news->news_text = $input['text'];
        $res = $news->update();
        if($res){
            return back()->with('errors','更新成功');
        }else{
            return back()->with('errors','更新失败，请稍后重试');
        }
    }

    //数据删除
    public function destroy($id){
        $res = News::where('news_id',$id)->delete();
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
        return view('admin.news.news-add');
    }

    //将获取的新闻内容提交到数据库
    /*public function store(){
        if($input = Input::all()){       //除了提交上来的_token意外其他的值都需要
            $rules = [                      //数据验证规则
                //required： 密码不能为空  between: 密码在多少位之间控制范围 confirmed:验证是否一致
                "title"=>'required',
                "content"=>'required',
            ];
            $message = [
                'title.required'=>'标题不能为空',
                'content.required'=>'新闻内容不能为空',
            ];
            //验证数据，$input 是要验证的数据， $rules： 是数据的验证规则  $message:  新密码不能为空
            $validator = Validator::make($input,$rules,$message);
            if($validator->passes()){       //查看数据验证是否通过
                $news = new News;
                $news->news_title = $input['title'];
                $news->news_content = $input['content'];
                $news->news_html = $input['html'];
                $news->news_text = $input['text'];
                $news->news_time = date('Y-m-d H:i:s');
                $result = $news->save();
                if($result){                            // 如果$result存在值的话
                    $data = [
                        'status' => 0,
                        'msg' => '添加成功！',
                    ];
                }else{
                    $data = [
                        'status' => 0,
                        'msg' => '添加失败！请认真检查数据是否有问题',
                    ];
                }
            }else{
                return back()->withErrors($validator)->withInput();      //将错误信息返回到界面
            }
        }else{
            return view('admin.news.news-add');
        }
    }*/
    public function store(){
    if($input = Input::all()){       //除了提交上来的_token意外其他的值都需要
        $rules = [                      //数据验证规则
            //required： 密码不能为空  between: 密码在多少位之间控制范围 confirmed:验证是否一致
            "title"=>'required',
            "content"=>'required',
        ];
        $message = [
            'title.required'=>'标题不能为空',
            'content.required'=>'新闻内容不能为空',
        ];
        //验证数据，$input 是要验证的数据， $rules： 是数据的验证规则  $message:  新密码不能为空
        $validator = Validator::make($input,$rules,$message);
        if($validator->passes()){       //查看数据验证是否通过
            $news = new News;
            $news->news_title = $input['title'];
            $news->news_content = $input['content'];
            $news->news_html = $input['html'];
            $news->news_text = $input['text'];
            $news->news_time = date('Y-m-d H:i:s');
            $result = $news->save();
            if($result){                            // 如果$result存在值的话
                return back()->with('errors','添加成功！')->withInput();
            }else{
                return back()->with('errors','请认真检查数据是否有问题，添加失败！')->withInput();
            }
        }else{
            return back()->withErrors($validator)->withInput();      //将错误信息返回到界面
        }
    }else{
        return view('admin.news.news-add');
    }
}
    
    
}