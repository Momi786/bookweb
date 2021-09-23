<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BoardMemberModel extends Model
{
    protected $table = "board_member";
    protected $fillable = ["name","designation","image","social_sites","social_link"];
}
