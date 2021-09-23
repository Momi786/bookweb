<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookTypeModel extends Model
{
    protected $table = "book_type";
    protected $fillable = ["name"];
}
