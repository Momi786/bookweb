<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\UserInformationModel;
use App\Models\UserTypeModel;
use App\Models\BookModel;

class UserModel extends Model
{
    protected $table = "users";
    protected $fillable = ["username","password","usertype","pending"];

    public function GetUserInfo(){
        $data = UserInformationModel::where('userId',$this->id)->first();
        return $data;
    }
    public function GetUserType(){
        $data = UserTypeModel::where('id',$this->usertype)->first();
        return $data;
    }
    public function GetBooks(){
        $data = BookModel::where('authorId',$this->userId)->get();
        return $data;
    }

}
