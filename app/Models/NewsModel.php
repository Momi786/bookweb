<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\UserInformationModel;

class NewsModel extends Model
{
    protected $table = "news";
    protected $fillable = ["newsImg","newsTitle","shotDes","detailDes","authorId","pending"];

    public function GetAuthor(){
        $data = UserInformationModel::where('userId',$this->authorId)->first();
        return $data;
    }
}
