<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Seckil extends Model
{
    protected $table = 'seckill';
		    protected $guarded = []; 
		    protected $primaryKey = "seckill_id";
			 protected $fillable = ['start_time','end_time'];
			public $timestamps = false;
}
