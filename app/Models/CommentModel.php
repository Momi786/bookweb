<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommentModel extends Model
{
    protected $table = "comment";
    protected $fillable = ["name","email","message","replyId","newsId"];

    public function GetReplies(){
        $data = CommentModel::where('replyId',$this->id)->where('newsId',$this->newsId)->get();
        return $data;
    }
}
