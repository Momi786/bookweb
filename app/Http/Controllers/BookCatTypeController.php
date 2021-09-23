<?php

namespace App\Http\Controllers;
use App\Models\BookCategoryModel;
use App\Models\BookTypeModel;

use Illuminate\Http\Request;

class BookCatTypeController extends Controller
{
    // Book Category Functions start
        public function ViewCategory(){
            $totalCategory = BookCategoryModel::all();
            return view('admin.book.category.index',compact('totalCategory'));
        }
        public function GetALLFeatureDeleteCategory(Request $request){
            for ($i = 0; $i < count($request->feature); $i++) {
                $data = BookCategoryModel::where('id',$request->feature[$i])->first();
                if($request->submit == "delete"){
                    $data->delete();
                }
            }
            return back();
        }
        public function AddCategory(){
            return view('admin.book.category.add');
        }
        public function AddCategoryProcess(Request $request){
            $data = $request->all();
            $Category = new BookCategoryModel;
            $Category->fill($data);
            $Category->save();
            $success = "Your Data has Saved successfully.";
            $request->session()->put("success",$success);
            return back();
        }
        public function DeleteCategory(Request $request,$id){
            $data = BookCategoryModel::find($id);
            $data->delete();
            $danger = "Your Data has been Delete successfully.";
            $request->session()->put("danger",$danger);
            return back();
        }
        public function EditCategory(Request $request, $id){
            $data = BookCategoryModel::find($id);
            return view('admin.book.category.edit',compact('data'));
        }
        public function EditCategoryProcess(Request $request, $id){
            $data = $request->all();
            $Category = BookCategoryModel::find($id);
            $Category->fill($data);
            $Category->save();
            $success = "Your Data has been Updated successfully.";
            $request->session()->put("success",$success);
            return back();
        }
    // Book Category Functions end
    // Book Type Functions start
        public function ViewType(){
            $totalType = BookTypeModel::all();
            return view('admin.book.type.index',compact('totalType'));
        }
        public function GetALLFeatureDeleteType(Request $request){
            for ($i = 0; $i < count($request->feature); $i++) {
                $data = BookTypeModel::where('id',$request->feature[$i])->first();
                if($request->submit == "delete"){
                    $data->delete();
                }
            }
            return back();
        }
        public function AddType(){
            return view('admin.book.type.add');
        }
        public function AddTypeProcess(Request $request){
            $data = $request->all();
            $Type = new BookTypeModel;
            $Type->fill($data);
            $Type->save();
            $success = "Your Data has Saved successfully.";
            $request->session()->put("success",$success);
            return back();
        }
        public function DeleteType(Request $request,$id){
            $data = BookTypeModel::find($id);
            $data->delete();
            $danger = "Your Data has been Delete successfully.";
            $request->session()->put("danger",$danger);
            return back();
        }
        public function EditType(Request $request, $id){
            $data = BookTypeModel::find($id);
            return view('admin.book.type.edit',compact('data'));
        }
        public function EditTypeProcess(Request $request, $id){
            $data = $request->all();
            $Type = BookTypeModel::find($id);
            $Type->fill($data);
            $Type->save();
            $success = "Your Data has been Updated successfully.";
            $request->session()->put("success",$success);
            return back();
        }
    // Book Type Functions end
}
