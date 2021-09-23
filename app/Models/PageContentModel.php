<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageContentModel extends Model
{
    protected $table = "page_content";
    protected $fillable = ["title","description","link","name"];
}
