<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookModel;
use App\Models\BookCategoryModel;
use App\Models\NewsModel;
use App\Models\AddToCartModel;
use App\Models\FAQModel;
use App\Models\FAQCategoryModel;

class ApiController extends Controller
{
    // Books Function start
        public function AllBooks(Request $request){
            $totalData = BookModel::leftJoin('book_category','book.categoryId', '=' , 'book_category.id')->select('book.*','book_category.name as book_category')->get();
            $totalData = $totalData->toArray();
            $JsonData = json_encode($totalData);
            return $JsonData;
        }
    // Books Function end
    
    // Book Categories Function start
        public function AllBookCategories(Request $request){
            $totalData = BookCategoryModel::all();
            $totalData = $totalData->toArray();
            $JsonData = json_encode($totalData);
            return $JsonData;
        }
    // Book Categories Function end

    // News Function start
        public function AllNews(Request $request){
            $totalData = NewsModel::all();
            $totalData = $totalData->toArray();
            $JsonData = json_encode($totalData);
            return $JsonData;
        }
    // News Function end
    
    // Cart Data Function start
        public function allCartData(Request $request,$id){
            $totalData = AddToCartModel::leftJoin('book','add_to_cart.productId', '=' , 'book.id')->select('book.*','add_to_cart.quantity')->where('add_to_cart.userId',$id)->get();
            $totalData = $totalData->toArray();
            $JsonData = json_encode($totalData);
            return $JsonData;
        }
    // Cart Data Function end
    
    // Faq Data Function start
        public function allFaqData(Request $request){
            $totalData = FAQModel::all();
            $totalCategory = FAQCategoryModel::all();
            $JsonData= array();
            $totalData = $totalData->toArray();
            $JsonData1 = json_encode($totalData);
            array_push($JsonData,$JsonData1);
            $totalCategory = $totalCategory->toArray();
            $JsonData2 = json_encode($totalCategory);
            array_push($JsonData,$JsonData2);
            return $JsonData;
        }
    // Faq Data Function end
}
