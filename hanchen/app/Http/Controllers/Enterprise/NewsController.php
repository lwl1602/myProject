<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/14
 * Time: 16:22
 */
namespace App\Http\Controllers\Enterprise;

use App\Http\Controllers\Controller;
use App\Http\Model\News;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class NewsController extends Controller{

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
        return view('admin.news.news-details',compact('news'));
    }
    


}