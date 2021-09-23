<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CouponModel extends Model
{
    protected $table = "coupon";
    protected $fillable = ["code","discount","endDate","userUse","userLimit"];
}
