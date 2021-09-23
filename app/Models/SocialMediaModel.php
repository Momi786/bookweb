<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SocialMediaModel extends Model
{
    protected $table = "social_media";
    protected $fillable = ["icon","title"];
}
