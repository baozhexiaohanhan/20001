<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    //指定表名
    protected $table = 'goods';
    protected $primaryKey = 'goods_id';
    public $timestamps = false;
    //黑名单
    protected $guarded = [];
}
