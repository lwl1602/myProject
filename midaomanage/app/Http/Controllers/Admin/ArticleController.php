<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Article;
use App\Http\Model\Category;
use Illuminate\Http\Request;

use App\Http\Requests;

class ArticleController extends CommonController
{
    public function index(){
        $data = Article::get();
        return view('admin.article.index',compact('data'));
    }

    public function  create(){
        $data = (new Category())->tree();
        return view('admin.article.add',compact('data'));
    }

}
