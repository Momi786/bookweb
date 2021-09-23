<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LogoFaviconModel;

class LogoFaviconController extends Controller
{

    public function View(){
        $logos = LogoFaviconModel::where('name','logo')->get();
        $favicons = LogoFaviconModel::where('name','favicon')->get();
        return view('admin.system_settings.logo_favicon.index',compact('logos','favicons'));
    }
    public function LogoAdd(){
        $name = "Logo";
        return view('admin.system_settings.logo_favicon.add',compact('name'));
    }
    public function FaviconAdd(){
        $name = "Favicon";
        return view('admin.system_settings.logo_favicon.add',compact('name'));
    }
    public function AddProcess(Request $request){
        $data = $request->all();
        if (isset($request->active) && $request->active == 1) {
            $old = LogoFaviconModel::where('name',$request->name)->where('active',1)->first();
            if($old){
                $old->active = 0;
                $old->save();
            }
        }
        if ($request->file("image") != null) {
            $path = $request->file("image")->store("Logo_Favicon_Images");
            $data["image"] = $path;
        }
        $new = new LogoFaviconModel;
        $new->fill($data);
        $new->save();
        $success = "Your Data has Saved successfully.";
        $request->session()->put("success",$success);
        return back();
    }
    public function Delete(Request $request,$id){
        $data = LogoFaviconModel::find($id);
        $data->delete();
        $danger = "Your Data has been Delete successfully.";
        $request->session()->put("danger",$danger);
        return back();
    }
    public function Active(Request $request,$id){
        $data = LogoFaviconModel::find($id);
        $old = LogoFaviconModel::where('name',$data->name)->where('active',1)->first();
        if($old){
            $old->active = 0;
            $old->save();
        }
        $data->active = 1;
        $data->save();
        $success = "This data has been Active successfully.";
        $request->session()->put("success",$success);
        return back();
    }
    public function Edit(Request $request, $id){
        $data = LogoFaviconModel::find($id);
        return view('admin.system_settings.logo_favicon.edit',compact('data'));
    }
    public function EditProcess(Request $request, $id){
        $data = $request->all();
        $update = LogoFaviconModel::find($id);
        if (isset($request->active) && $request->active == 1) {
            $old = LogoFaviconModel::where('name',$update->name)->where('active',1)->first();
            if($old){
                $old->active = 0;
                $old->save();
            }
        }
        if ($request->file("image") != null) {
            $path = $request->file("image")->store("Logo_Favicon_Images");
            $data["image"] = $path;
        }
        $update->fill($data);
        $update->save();
        $success = "Your Data has been Updated successfully.";
        $request->session()->put("success",$success);
        return back();
    }
}
