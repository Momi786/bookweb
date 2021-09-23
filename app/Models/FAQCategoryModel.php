<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\FAQModel;

class FAQCategoryModel extends Model
{
    protected $table = "faq_category";
    protected $fillable = ["name"];

    public function GetEntities(){
        $data = FAQModel::where('categoryId',$this->id)->get();
        return $data;
    }
}
