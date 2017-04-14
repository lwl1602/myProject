<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/14
 * Time: 16:22
 */
namespace App\Http\Controllers\Admin;

use App\Http\Model\Link;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class NewsController extends CommonController{
    
    public function index(){
        return view('admin.news.news-list');
    }

    public function create(){
        return view('admin.news.news-add');
    }

    public function demo(){
        return view('admin.news.default');
    }
    
}