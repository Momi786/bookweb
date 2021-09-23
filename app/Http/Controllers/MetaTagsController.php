<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MetaTagsModel;
use App\Models\MetaKeywordsModel;

class MetaTagsController extends Controller
{

    public function Index(Request $request) {
        $totalData = MetaTagsModel::where('main',1)->get();
        return view('admin.meta-tags.meta_tags',compact('totalData'));
    }
    public function Edit(Request $request,$id) {
        $data = MetaTagsModel::find($id);
        $MetaKeywords = MetaKeywordsModel::all();
        return view('admin.meta-tags.edit',compact('data','MetaKeywords'));
    }
    public function EditProcess(Request $request,$id) {
        $data1 = $request->all();
        for ($i=0; $i < count($request->metaKeywords); $i++) {
            $find = MetaKeywordsModel::where('name',$request->metaKeywords[$i])->first();
            if($find == null){
                $key = new MetaKeywordsModel;
                $key->name = $request->metaKeywords[$i];
                $key->save();
            }
        }
        $newMeta = MetaTagsModel::find($id);
        $newMeta->description = $request->metaDescription;
        $newMeta->title = $request->metaTitle;
        $newMeta->keywordsimp = implode(",",$request->metaKeywords);
        $newMeta->save();
        $success = "This Data has been updated successfully.";
        $request->session()->put("success",$success);
        return back();
    }

}
