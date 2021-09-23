<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\BookModel;

class SpecialOfferModel extends Model
{
    protected $table = "special_offer";
    protected $fillable = ["salePercent","bookId"];
    public function GetBook(){
        $data = BookModel::find($this->bookId);
        return $data;
    }
}
