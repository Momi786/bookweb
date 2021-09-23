<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TestimonialModel extends Model
{
    protected $table = "testimonial";
    protected $fillable = ["title","image","designation","rating","description"];
}
