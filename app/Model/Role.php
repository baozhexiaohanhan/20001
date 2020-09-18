<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
<<<<<<< HEAD
    //指定表名
    protected $table = 'role';
    //指定主键
    protected $primaryKey = 'role_id';
    //关闭时间戳
    public $timestamps = false;
    //黑名单
=======
    //指定表面
    protected $table = 'role';
    protected $primaryKey = 'role_id';
    public $timestamps = false;
>>>>>>> b9ed352f2172e06b16cff34c4bca601debc8c6bd
    protected $guarded = [];
}
