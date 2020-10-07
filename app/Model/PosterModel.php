<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PosterModel extends Model
{
    protected $table = 'ecs_ad_position';
    protected $guarded = [];
    protected $primaryKey = "position_id";
  
    // protected $fillable = ['cat_name','enabled','attr_group'];
    public $timestamps = false;
}
