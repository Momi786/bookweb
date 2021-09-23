<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\BookCategoryModel;
use App\Models\UserInformationModel;
use App\Models\FlashSaleModel;
use App\Models\SpecialOfferModel;
use App\Models\BookTypeModel;
use App\Models\SaleModel;

class BookModel extends Model
{
    protected $table = "book";
    protected $fillable = ["name","categoryId","authorId","feature","description","detailDescription","cover_image","pending","price","recommded_only","recommded_all","stock","typeId"];

    public function GetCategory(){
        $data = BookCategoryModel::where('id',$this->categoryId)->first();
        return $data;
    }
    public function GetType(){
        $data = BookTypeModel::where('id',$this->typeId)->first();
        return $data;
    }
    public function GetAuthor(){
        $data = UserInformationModel::where('userId',$this->authorId)->first();
        return $data;
    }
    public function GetSale(){
        $data = SaleModel::where('bookId',$this->id)->first();
        if ($data) {
            $result = "error";
            return $result;
        }else{
            $data1 = SpecialOfferModel::where('bookId',$this->id)->first();
            if ($data1) {
                $result = "error";
                return $result;
            }else{
                $data2 = FlashSaleModel::where('bookId',$this->id)->where('endTime','>',date('Y-m-d H:i:s'))->first();
                if ($data2) {
                    $result = "error";
                    return $result;
                }else{
                    $result = "success";
                    return $result;
                }
            }
        }
    }
    public function GetSaleData(){
        $data = SaleModel::where('bookId',$this->id)->first();
        if ($data) {
            $result = $data;
            return $result;
        }else{
            $data1 = SpecialOfferModel::where('bookId',$this->id)->first();
            if ($data1) {
                $result = $data1;
                return $result;
            }else{
                $data2 = FlashSaleModel::where('bookId',$this->id)->where('endTime','>',date('Y-m-d H:i:s'))->first();
                if ($data2) {
                    $result = $data2;
                    return $result;
                }else{
                    $result = "error";
                    return $result;
                }
            }
        }
    }
}
