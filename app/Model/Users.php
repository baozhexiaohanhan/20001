<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    //指定表面
    protected $table = 'shop_user';
    protected $primaryKey = 'user_id';
    public $timestamps = false;

    //黑名单
    protected $guarded = [];
}
