<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function index(){
        $pdo = DB::connection()->getPdo();     //检查是否连接数据库
        //dd($pdo);

        $user = DB::table('user')->get();
        dd($user);

    }
}
