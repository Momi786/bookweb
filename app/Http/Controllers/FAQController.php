<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FAQCategoryModel;
use App\Models\FAQModel;

class FAQController extends Controller
{

    // faq Functions start
        public function Index(Request $request){
            $totalData = FAQModel::all();
            return view('admin.faq.index',compact('totalData'));
        }
        public function GetALLFeatureDelete(Request $request){
            if (isset($request->feature)) {
                for ($i = 0; $i < count($request->feature); $i++) {
                    $data = FAQModel::where('id',$request->feature[$i])->first();
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
        public function Add(){
            $FAQCategory = FAQCategoryModel::all();
            return view('admin.faq.add',compact('FAQCategory'));
        }
        public function AddProcess(Request $request){
            $data = $request->all();
            $Faq = new FAQModel;
            $Faq->fill($data);
            $Faq->save();
            $success = "Your Data has Saved successfully.";
            $request->session()->put("success",$success);
            return back();
        }
        public function Delete(Request $request,$id){
            $data = FAQModel::find($id);
            $data->delete();
            $danger = "Your Data has been Delete successfully.";
            $request->session()->put("danger",$danger);
            return back();
        }
        public function Edit(Request $request,$id){
            $data = FAQModel::find($id);
            $FAQCategory = FAQCategoryModel::all();
            return view('admin.faq.edit',compact('data','FAQCategory'));
        }
        public function EditProcess(Request $request,$id){
            $data = $request->all();
            $Faq = FAQModel::find($id);
            $Faq->fill($data);
            $Faq->save();

            $success = "Your Data has been Updated successfully.";
            $request->session()->put("success",$success);
            return back();
        }
    // faq Functions end
    // faq Category Functions start
        public function ViewCategory(){
            $totalCategory = FAQCategoryModel::all();
            return view('admin.faq.category.index',compact('totalCategory'));
        }
        public function GetALLFeatureDeleteCategory(Request $request){
            for ($i = 0; $i < count($request->feature); $i++) {
                $data = FAQCategoryModel::where('id',$request->feature[$i])->first();
                if($request->submit == "delete"){
                    $data->delete();
                }
            }
            return back();
        }
        public function AddCategory(){
            return view('admin.faq.category.add');
        }
        public function AddCategoryProcess(Request $request){
            $data = $request->all();
            $Category = new FAQCategoryModel;
            $Category->fill($data);
            $Category->save();
            $success = "Your Data has Saved successfully.";
            $request->session()->put("success",$success);
            return back();
        }
        public function DeleteCategory(Request $request,$id){
            $data = FAQCategoryModel::find($id);
            $data->delete();
            $danger = "Your Data has been Delete successfully.";
            $request->session()->put("danger",$danger);
            return back();
        }
        public function EditCategory(Request $request, $id){
            $data = FAQCategoryModel::find($id);
            return view('admin.faq.category.edit',compact('data'));
        }
        public function EditCategoryProcess(Request $request, $id){
            $data = $request->all();
            $Category = FAQCategoryModel::find($id);
            $Category->fill($data);
            $Category->save();
            $success = "Your Data has been Updated successfully.";
            $request->session()->put("success",$success);
            return back();
        }
    // faq Category Functions end

}
