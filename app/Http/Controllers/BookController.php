<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookModel;
use App\Models\BookCategoryModel;
use App\Models\BookTypeModel;
use App\Models\UserModel;
use App\Models\SaleModel;

class BookController extends Controller
{
    // Book Functions start
        public function Index(Request $request){
            $value = $request->session()->get('onlineuser');
            if($value['usertype'] == 2){
                $id = $value['id'];
                $totalData = BookModel::where('authorId',$id)->get();
            }else{
                $totalData = BookModel::all();
            }
            return view('admin.book.index',compact('totalData'));
        }
        public function GetALLFeatureDelete(Request $request){
            if (isset($request->feature)) {
                for ($i = 0; $i < count($request->feature); $i++) {
                    $data = BookModel::where('id',$request->feature[$i])->first();
                    if($request->submit == "delete"){
                        $data->delete();
                    }elseif($request->submit == "feature"){
                        $data->feature = 1;
                        $data->save();
                    }elseif($request->submit == "unfeature"){
                        $data->feature = 0;
                        $data->save();
                    }
                }
            }else{
                $danger = "Your did not select any row.";
                $request->session()->put("danger",$danger);
            }
            return back();
        }
        public function Add(){
            $BookCategory = BookCategoryModel::all();
            $BookType = BookTypeModel::all();
            $Author = UserModel::where('usertype',2)->get();
            return view('admin.book.add',compact('BookCategory','Author','BookType'));
        }
        public function AddProcess(Request $request){
            $data = $request->all();
            $value = $request->session()->get('onlineuser');
            if($value['usertype'] == 2){
                $data['authorId'] = $value['id'];
                $data['pending'] = 1;
            }
            if ($request->file("cover_image") != null) {
                $path = $request->file("cover_image")->store("Book_Images");
                $data["cover_image"] = $path;
            }
            $data["editor1"] = htmlentities($data["editor1"]);
            $data["detailDescription"] = $data["editor1"];
            unset($data["editor1"]);
            $Book = new BookModel;
            $Book->fill($data);
            $Book->save();
            $success = "Your Data has Saved successfully.";
            $request->session()->put("success",$success);
            return back();
        }
        public function Delete(Request $request,$id){
            $data = BookModel::find($id);
            $data->delete();
            $danger = "Your Data has been Delete successfully.";
            $request->session()->put("danger",$danger);
            return back();
        }
        public function Allow(Request $request,$id){
            $data = BookModel::find($id);
            $data->pending = 0;
            $data->save();
            $success = "This book has been Active successfully.";
            $request->session()->put("success",$success);
            return back();
        }
        public function Edit(Request $request,$id){
            $data = BookModel::find($id);
            $BookType = BookTypeModel::all();
            $BookCategory = BookCategoryModel::all();
            $Author = UserModel::where('usertype',2)->get();
            return view('admin.book.edit',compact('data','Author','BookCategory','BookType'));
        }
        public function EditProcess(Request $request,$id){
            $data = $request->all();
            if ($request->file("cover_image") != null) {
                $path = $request->file("cover_image")->store("Book_Images");
                $data["cover_image"] = $path;
            }
            if (!isset($request->recommded_all)) {
                $data["recommded_all"] = 0;
            }
            if (!isset($request->recommded_only)) {
                $data["recommded_only"] = 0;
            }
            $value = $request->session()->get('onlineuser');
            if($value['usertype'] == 2){
                $data['authorId'] = $value['id'];
                $data['pending'] = 1;
            }
            $data["editor1"] = htmlentities($data["editor1"]);
            $data["detailDescription"] = $data["editor1"];
            unset($data["editor1"]);

            $Book = BookModel::find($id);
            $Book->fill($data);
            $Book->save();

            $success = "Your Data has been Updated successfully.";
            $request->session()->put("success",$success);
            return back();
        }
        public function FeatureProcess(Request $request,$id){
            $data = BookModel::find($id);
            if($request->feature){
                $data->feature = 1;
            }else{
                $data->feature = 0;
            }
            $data->save();
            return back();
        }
    // Book Functions end
    // Book Sale Functions start
        public function ViewSale(){
            $totalSale = SaleModel::all();
            return view('admin.book.sale.index',compact('totalSale'));
        }
        public function GetALLFeatureDeleteSale(Request $request){
            for ($i = 0; $i < count($request->feature); $i++) {
                $data = SaleModel::where('id',$request->feature[$i])->first();
                if($request->submit == "delete"){
                    $data->delete();
                }
            }
            return back();
        }
        public function AddSale(){
            $totalBooks = BookModel::where('pending',0)->get();
            return view('admin.book.sale.add',compact('totalBooks'));
        }
        public function AddSaleProcess(Request $request){
            $data = $request->all();
            $old = SaleModel::where('bookId',$request->bookId)->first();
            if ($old) {
                $danger = "This Book is already on Sale.";
                $request->session()->put("danger",$danger);
            }else{
                $sale = new SaleModel;
                $sale->fill($data);
                $sale->save();
                $success = "Your Data has Saved successfully.";
                $request->session()->put("success",$success);
            }
            return back();
        }
        public function DeleteSale(Request $request,$id){
            $data = SaleModel::find($id);
            $data->delete();
            $danger = "Your Data has been Delete successfully.";
            $request->session()->put("danger",$danger);
            return back();
        }
        public function EditSale(Request $request, $id){
            $data = SaleModel::find($id);
            $selectedBook = BookModel::find($data->bookId);
            return view('admin.book.sale.edit',compact('data','selectedBook'));
        }
        public function EditSaleProcess(Request $request, $id){
            $data = $request->all();
            $sale = SaleModel::find($id);
            $sale->fill($data);
            $sale->save();
            $success = "Your Data has been Updated successfully.";
            $request->session()->put("success",$success);
            return back();
        }
    // Book Sale Functions end
}
