<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RatingModel extends Model
{
    protected $table = "rating";
    protected $fillable = ["rating","userId","bookId"];

}
