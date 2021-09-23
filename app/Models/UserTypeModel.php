<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserTypeModel extends Model
{
    protected $table = "user_type";
    protected $fillable = ["usertype"];
}
