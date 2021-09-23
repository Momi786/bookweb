<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookModel;
use App\Models\SpecialOfferModel;
use App\Models\FlashSaleModel;

class SpecialFlashController extends Controller
{

    // Book Special Functions start
        public function ViewSpecial(){
            $totalSale = SpecialOfferModel::all();
            return view('admin.book.special.index',compact('totalSale'));
        }
        public function GetALLFeatureDeleteSpecial(Request $request){
            if (isset($request->feature)) {
                for ($i = 0; $i < count($request->feature); $i++) {
                    $data = SpecialOfferModel::where('id',$request->feature[$i])->first();
                    if($request->submit == "delete"){
                        $data->delete();
                    }
                }
            }else{
                $danger = "Your did not select any row.";
                $request->session()->put("danger",$danger);
            }
            return back();
        }
        public function AddSpecial(){
            $totalBooks = BookModel::where('pending',0)->get();
            return view('admin.book.special.add',compact('totalBooks'));
        }
        public function AddSpecialProcess(Request $request){
            $data = $request->all();
            $old = SpecialOfferModel::where('bookId',$request->bookId)->first();
            if ($old) {
                $danger = "This Book is already on Special Offer section.";
                $request->session()->put("danger",$danger);
            }else{
                $special = new SpecialOfferModel;
                $special->fill($data);
                $special->save();
                $success = "Your Data has Saved successfully.";
                $request->session()->put("success",$success);
            }
            return back();
        }
        public function DeleteSpecial(Request $request,$id){
            $data = SpecialOfferModel::find($id);
            $data->delete();
            $danger = "Your Data has been Delete successfully.";
            $request->session()->put("danger",$danger);
            return back();
        }
        public function EditSpecial(Request $request, $id){
            $data = SpecialOfferModel::find($id);
            $selectedBook = BookModel::find($data->bookId);
            return view('admin.book.special.edit',compact('data','selectedBook'));
        }
        public function EditSpecialProcess(Request $request, $id){
            $data = $request->all();
            $special = SpecialOfferModel::find($id);
            $special->fill($data);
            $special->save();
            $success = "Your Data has been Updated successfully.";
            $request->session()->put("success",$success);
            return back();
        }
    // Book Special Functions end
    // Book Flash Functions start
        public function ViewFlash(){
            $totalSale = FlashSaleModel::all();
            return view('admin.book.flash.index',compact('totalSale'));
        }
        public function GetALLFeatureDeleteFlash(Request $request){
            if (isset($request->feature)) {
                for ($i = 0; $i < count($request->feature); $i++) {
                    $data = FlashSaleModel::where('id',$request->feature[$i])->first();
                    if($request->submit == "delete"){
                        $data->delete();
                    }
                }
            }else{
                $danger = "Your did not select any row.";
                $request->session()->put("danger",$danger);
            }
            return back();
        }
        public function AddFlash(){
            $totalBooks = BookModel::where('pending',0)->get();;
            return view('admin.book.flash.add',compact('totalBooks'));
        }
        public function AddFlashProcess(Request $request){
            $data = $request->all();
            $old = FlashSaleModel::where('bookId',$request->bookId)->first();
            if ($old) {
                $danger = "This Book is already on Flash Sale section.";
                $request->session()->put("danger",$danger);
            }else{
                $flash = new FlashSaleModel;
                $flash->fill($data);
                $flash->save();
                $success = "Your Data has Saved successfully.";
                $request->session()->put("success",$success);
            }
            return back();
        }
        public function DeleteFlash(Request $request,$id){
            $data = FlashSaleModel::find($id);
            $data->delete();
            $danger = "Your Data has been Delete successfully.";
            $request->session()->put("danger",$danger);
            return back();
        }
        public function EditFlash(Request $request, $id){
            $data = FlashSaleModel::find($id);
            $selectedBook = BookModel::find($data->bookId);
            return view('admin.book.flash.edit',compact('data','selectedBook'));
        }
        public function EditFlashProcess(Request $request, $id){
            $data = $request->all();
            $flash = FlashSaleModel::find($id);
            $flash->fill($data);
            $flash->save();
            $success = "Your Data has been Updated successfully.";
            $request->session()->put("success",$success);
            return back();
        }
    // Book Flash Functions end
}
