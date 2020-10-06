<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Poster extends Model
{
    protected $table = 'ecs_ad_position';
    protected $primaryKey = 'position_id';
    public $timestamps = false;

    //黑名单
    protected $guarded = [];
}
