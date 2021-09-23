<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MainMenuModel extends Model
{
    protected $table = "main_menu";
    protected $fillable = ["name","link"];
}
