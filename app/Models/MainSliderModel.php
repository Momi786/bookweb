<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MainSliderModel extends Model
{
    protected $table = "main_slider";
    protected $fillable = ["image","h1","description","h2","link1title","h3","link1","link2","link2title"];
}
