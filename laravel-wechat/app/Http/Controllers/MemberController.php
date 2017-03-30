<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/16
 * Time: 16:29
 */
namespace App\Http\Controllers;//命名空间

use App\Member;

class MemberController extends Controller{
    
    public function info(){
        return view('welcome');
    }
}
