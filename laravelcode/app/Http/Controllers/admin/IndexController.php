<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/30
 * Time: 18:15
 */
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

class IndexController extends Controller{
    
    public function index(){
        echo "1111111";
    }

    public function login(){
        /*session(['user'=>'lwl222']);*/
        echo "登录界面";
    }

    /*
     * 使用with 传一个变量到视图
     */
    public function view(){
        $name = "李文乐";
        return view('welcome')->with('name',$name); //一个变量
        //return view('welcome')->with('name',$name)->with('age',26);  //两个变量
    }

    public function arrayView(){
        /*$arr = [
            'name'=>'李文乐',
            'age' => 26
        ];
        return view('welcome',$arr); //传递一个数组*/


        $arr = [
            'name'=>'李文乐',
            'age' => 26
        ];
        $titl = "title";
        return view('welcome',compact('arr','titl'));//数组加上其他的非数组参数
        
    }
    
}
