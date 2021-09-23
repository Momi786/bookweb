<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FooterContentModel extends Model
{
    protected $table = "footer_content";
    protected $fillable = ["icon","title","description","social_media","social_link"];

}
