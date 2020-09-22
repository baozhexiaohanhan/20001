<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Attr extends Model
{
    protected $table = 'ecs_attribute';
    //指定主键
    protected $primaryKey = 'attr_id';
    //关闭时间戳
    public $timestamps = false;
    //黑名单
    protected $guarded = [];
}
