<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\BookModel;

class FlashSaleModel extends Model
{
    protected $table = "flash_sale";
    protected $fillable = ["salePercent","bookId","endTime"];
    public function GetBook(){
        $data = BookModel::find($this->bookId);
        return $data;
    }
}
