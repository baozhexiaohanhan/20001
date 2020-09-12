<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    //指定表面
    protected $table = 'login';
    protected $primaryKey = 'admin_id';
    public $timestamps = false;

    //黑名单
    protected $guarded = [];
}
