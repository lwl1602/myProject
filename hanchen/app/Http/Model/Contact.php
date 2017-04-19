<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/7
 * Time: 16:22
 */
namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model{

    protected $table = 'contact';
    protected $primaryKey = 'contact_id';
    public $timestamps = false;
    public $guarded = [];

}