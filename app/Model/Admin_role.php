<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Admin_role extends Model
{
    //指定表面
    protected $table = 'admin_role';
    // protected $primaryKey = 'admin_id';
    public $timestamps = false;

    //黑名单
    protected $guarded = [];
}
