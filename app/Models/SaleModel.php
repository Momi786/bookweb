<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\BookModel;

class SaleModel extends Model
{
    protected $table = "sale_book";
    protected $fillable = ["salePercent","bookId"];

    public function GetBook(){
        $data = BookModel::find($this->bookId);
        return $data;
    }
}
