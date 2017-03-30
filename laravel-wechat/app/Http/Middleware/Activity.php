<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/20
 * Time: 9:27
 */
namespace App\Http\Middleware;

use Closure;

class Activity{

    //请求执行前执行，前置操作
    /*public function handle($request,Closure $next){

        //strtotime('2016-06-05')将任何字符串的日期时间描述解析为 Unix 时间戳
        if(time() < strtotime('2017-03-21')){
            return redirect('activity0');//跳入到activity0这个页面
        }
        return $next($request);
    }*/

    public function handle($request,Closure $next){
        $response = $next($request);
        var_dump($response);
        //逻辑在请求后面执行
        echo '后置操作';
    }
}