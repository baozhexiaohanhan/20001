<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
<<<<<<< HEAD
    //指定表面
    protected $table = 'role';
    protected $primaryKey = 'role_id';
    public $timestamps = false;

=======
    //指定表名
    protected $table = 'role';
    //指定主键
    protected $primaryKey = 'role_id';
    //关闭时间戳
    public $timestamps = false;
>>>>>>> exam
    //黑名单
    protected $guarded = [];
}
