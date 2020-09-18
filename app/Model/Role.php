<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //指定表名
    protected $table = 'role';
    //指定主键
    protected $primaryKey = 'role_id';
    //关闭时间戳
    public $timestamps = false;
    //黑名单
    //指定表面
}
