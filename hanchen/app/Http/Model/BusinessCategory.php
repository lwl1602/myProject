<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/15
 * Time: 10:13
 */
namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class BusinessCategory extends Model{

    protected $table = 'businesscategory';
    protected $primaryKey = 'bc_id';
    public $timestamps = false;
    public $guarded = [];

    public function Business(){
        return $this->hasMany('Business','bc_id');
    }

    /*public function SusseccfulCase(){
        return $this->hasMany('SusseccfulCase','bc_id');
    }*/


}