<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\FAQCategoryModel;

class FAQModel extends Model
{
    protected $table = "faq";
    protected $fillable = ["ques","ans","categoryId"];

    public function GetCategory(){
        $data = FAQCategoryModel::where('id',$this->categoryId)->first();
        return $data;
    }
}
