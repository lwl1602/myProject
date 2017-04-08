<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;

class CommonController extends Controller
{
    public function upload(){
        $file = Input::file('Filedata');
        if($file->isValid()){           //判断文件是否有效
            $realPath = $file ->getRealPath();      //获取文件的绝对路径
            $entension = $file -> getClientOriginalExtension();     //获取文件的后缀名
            $newName = date('YmdHis').mt_rand(100,999).'.'.$entension;
            $path = $file -> move(base_path().'/uploads',$newName); //移动到指定的文件夹   base_path()：当前的blog文件夹
            $filePath = 'uploads/'.$newName;
            return $filePath;
        }
    }
}
