<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/15
 * Time: 10:13
 */
namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Business extends Model{

    protected $table = 'business';
    protected $primaryKey = 'bus_id';
    public $timestamps = false;
    public $guarded = [];

    public function BusinessCategory(){
        return $this->belongsTo(BusinessCategory::class,'bc_id');
    }

}