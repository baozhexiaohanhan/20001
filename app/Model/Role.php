<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //指定表面
    protected $table = 'role';
    protected $primaryKey = 'role_id';
    public $timestamps = false;

    //黑名单
    protected $guarded = [];
}
