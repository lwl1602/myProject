<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/16
 * Time: 17:42
 */
namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model{
    public static function getMember(){
        return 'member name is sean';
    }
}
