<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserInformationModel extends Model
{
    protected $table = "user_information";
    protected $fillable = ["name","social_sites","social_link","description","userId","image"];

}
