<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientModel extends Model
{
    protected $table = "client";
    protected $fillable = ["firstName","lastName","email","password","block"];

}
