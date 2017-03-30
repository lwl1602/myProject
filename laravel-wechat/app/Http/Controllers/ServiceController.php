<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/28
 * Time: 14:57
 */
namespace App\Http\Controllers;//命名空间

class ServiceController extends Controller{
    
    public function service(){
        return view('wechat.servicecontent.index');
    }
    
    public function contentindex(){
        return view('wechat.servicecontent.index');
    }

    public function servicemenu(){
        return view('wechat.servicecontent.menu');
    }
    
}