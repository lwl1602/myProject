<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/5
 * Time: 9:28
 */
namespace App\Http\Model;
use Illuminate\Database\Eloquent\Model;

class User extends Model{

    protected $table = "user";
    protected $primaryKey='user_id';
    public $timestamps=false;

}