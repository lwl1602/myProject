<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/15
 * Time: 10:13
 */
namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Laws extends Model{

    protected $table = 'laws';
    protected $primaryKey = 'laws_id';
    public $timestamps = false;
    public $guarded = [];

}