<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/31
 * Time: 10:34
 */
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

class ArticleController extends Controller{

    public function index(){
        echo "article  index get方法请求";
    }

    public function store(){
        echo "使用post方法启动";
    }

}