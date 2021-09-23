<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewsModel;
use App\Models\UserModel;


class NewsController extends Controller
{
    public function ViewNews(Request $request){
        $value = $request->session()->get('onlineuser');
        $totalNews = NewsModel::all();
        if($value['usertype'] == 2){
            $id = $value['id'];
            $totalData = NewsModel::where('authorId',$id)->get();
        }else{
            $totalData = NewsModel::all();
        }
        return view('admin.news.index',compact('totalNews'));
    }
    public function GetALLFeatureDeleteNews(Request $request){
        for ($i = 0; $i < count($request->feature); $i++) {
            $data = NewsModel::where('id',$request->feature[$i])->first();
            if($request->submit == "delete"){
                $data->delete();
            }
        }
        return back();
    }
    public function AddNews(){
        $Author = UserModel::where('usertype',2)->get();
        return view('admin.news.add',compact('Author'));
    }
    public function AddNewsProcess(Request $request){
        $data = $request->all();
        $value = $request->session()->get('onlineuser');
        if($value['usertype'] == 2){
            $data['authorId'] = $value['id'];
            $data['pending'] = 1;
        }
        if ($request->file("newsImg") != null) {
            $path = $request->file("newsImg")->store("News_Images");
            $data["newsImg"] = $path;
        }
        $data["editor1"] = htmlentities($data["editor1"]);
        $data["detailDes"] = $data["editor1"];
        unset($data["editor1"]);
        $news = new NewsModel;
        $news->fill($data);
        $news->save();
        $success = "Your Data has Saved successfully.";
        $request->session()->put("success",$success);
        return back();
    }
    public function DeleteNews(Request $request,$id){
        $data = NewsModel::find($id);
        $data->delete();
        $danger = "Your Data has been Delete successfully.";
        $request->session()->put("danger",$danger);
        return back();
    }
    public function AllowNews(Request $request,$id){
        $data = NewsModel::find($id);
        $data->pending = 0;
        $data->save();
        $success = "This news has been Active successfully.";
        $request->session()->put("success",$success);
        return back();
    }
    public function EditNews(Request $request, $id){
        $data = NewsModel::find($id);
        $Author = UserModel::where('usertype',2)->get();
        return view('admin.news.edit',compact('data','Author'));
    }
    public function EditNewsProcess(Request $request, $id){
        $data = $request->all();
        $value = $request->session()->get('onlineuser');
        if($value['usertype'] == 2){
            $data['authorId'] = $value['id'];
        }
        if ($request->file("newsImg") != null) {
            $path = $request->file("newsImg")->store("News_Images");
            $data["newsImg"] = $path;
        }
        $data["editor1"] = htmlentities($data["editor1"]);
        $data["detailDes"] = $data["editor1"];
        unset($data["editor1"]);
        $news = NewsModel::find($id);
        $news->fill($data);
        $news->save();
        $success = "Your Data has been Updated successfully.";
        $request->session()->put("success",$success);
        return back();
    }
}
