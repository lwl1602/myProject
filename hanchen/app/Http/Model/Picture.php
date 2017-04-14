<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/12
 * Time: 9:56
 */
namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model{

    public $table = 'picture';
    public $primaryKey = 'img_id';
    public $timestamps = false;
    public $guarded = [];

}