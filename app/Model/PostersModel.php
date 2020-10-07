<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PostersModel extends Model
{
    protected $table = 'ecs_ad';
    protected $guarded = [];
    protected $primaryKey = "ad_id";

    // protected $fillable = ['cat_name','enabled','attr_group'];
    public $timestamps = false;
}
