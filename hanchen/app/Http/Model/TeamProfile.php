<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/15
 * Time: 10:13
 */
namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class TeamProfile extends Model{

    protected $table = 'teamprofile';
    protected $primaryKey = 'tp_id';
    public $timestamps = false;
    public $guarded = [];

}