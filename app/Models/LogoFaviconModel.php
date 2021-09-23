<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LogoFaviconModel extends Model
{
    protected $table = "logo_favicon";
    protected $fillable = ["image","active","name"];
}
