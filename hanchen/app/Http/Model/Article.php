<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/7
 * Time: 16:22
 */
namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Article extends Model{

    protected $table = 'article';
    protected $primaryKey = 'art_id';
    public $timestamps = false;
    public $guarded = [];

}