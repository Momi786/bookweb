<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\BookModel;

class OrderProductsModel extends Model
{
    protected $table = "order_product";
    protected $fillable = ["productId","quantity","orderId"];

    public function GetDetail(){
        $data = BookModel::where('id',$this->productId)->first();
        return $data;
    }
}
