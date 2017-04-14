<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    public $table = 'link';
    public $primaryKey = 'link_id';
    public $timestamps = false;
    public $guarded = [];
}
