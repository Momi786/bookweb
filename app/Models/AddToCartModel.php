<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\BookModel;

class AddToCartModel extends Model
{
    protected $table = "add_to_cart";
    protected $fillable = ["productId","userId","quantity","sessionId"];
    
    public function GetBook(){
        $data = BookModel::find($this->productId);
        return $data;
    }
}
