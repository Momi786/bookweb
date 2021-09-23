<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewsLetterSendMailModel extends Model
{
    protected $table = "newsletter_send_mail";
    protected $fillable = ["subject","message"];

}
