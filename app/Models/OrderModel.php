<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\OrderProductsModel;
use App\Models\ClientModel;

class OrderModel extends Model
{
    protected $table = "orders";
    protected $fillable = ["userId","totalPrice","status"];
    
    public function GetProducts(){
        $data = OrderProductsModel::where('orderId',$this->id)->get();
        return $data;
    }
    
    public function GetUser(){
        $data = ClientModel::where('id',$this->userId)->first();
        return $data;
    }
}
