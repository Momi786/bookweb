<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SocialMediaModel;
use App\Models\MainMenuModel;
use App\Models\MainSliderModel;
use App\Models\PageContentModel;
use App\Models\FooterContentModel;
use App\Models\TestimonialModel;
use App\Models\BookModel;
use App\Models\UserModel;
use App\Models\ClientModel;

class SystemSettingController extends Controller
{
    // Testimonial Functions start
        public function ViewTestimonial(){
            $totalData = TestimonialModel::all();
            return view('admin.system_settings.testimonial.index',compact('totalData'));
        }
        public function GetALLFeatureDeleteTestimonial(Request $request){
            for ($i = 0; $i < count($request->feature); $i++) {
                $data = TestimonialModel::where('id',$request->feature[$i])->first();
                if($request->submit == "delete"){
                    $data->delete();
                }
            }
            return back();
        }
        public function AddTestimonial(){
            return view('admin.system_settings.testimonial.add');
        }
        public function AddTestimonialProcess(Request $request){
            $data = $request->all();
            if ($request->file("image") != null) {
                $path = $request->file("image")->store("Testimonial_Images");
                $data["image"] = $path;
            }
            $new = new TestimonialModel;
            $new->fill($data);
            $new->save();
            $success = "Your Data has Saved successfully.";
            $request->session()->put("success",$success);
            return back();
        }
        public function DeleteTestimonial(Request $request,$id){
            $data = TestimonialModel::find($id);
            $data->delete();
            $danger = "Your Data has been Delete successfully.";
            $request->session()->put("danger",$danger);
            return back();
        }
        public function EditTestimonial(Request $request, $id){
            $data = TestimonialModel::find($id);
            return view('admin.system_settings.testimonial.edit',compact('data'));
        }
        public function EditTestimonialProcess(Request $request, $id){
            $data = $request->all();
            if ($request->file("image") != null) {
                $path = $request->file("image")->store("Testimonial_Images");
                $data["image"] = $path;
            }
            $edit = TestimonialModel::find($id);
            $edit->fill($data);
            $edit->save();
            $success = "Your Data has been Updated successfully.";
            $request->session()->put("success",$success);
            return back();
        }
    // Testimonial Functions end
    // Social Media Functions start
        public function ViewSocial(){
            $totalSocial = SocialMediaModel::all();
            return view('admin.system_settings.social.index',compact('totalSocial'));
        }
        public function GetALLFeatureDeleteSocial(Request $request){
            for ($i = 0; $i < count($request->feature); $i++) {
                $data = SocialMediaModel::where('id',$request->feature[$i])->first();
                if($request->submit == "delete"){
                    $data->delete();
                }
            }
            return back();
        }
        public function AddSocial(){
            return view('admin.system_settings.social.add');
        }
        public function AddSocialProcess(Request $request){
            $data = $request->all();
            $Social = new SocialMediaModel;
            $Social->fill($data);
            $Social->save();
            $success = "Your Data has Saved successfully.";
            $request->session()->put("success",$success);
            return back();
        }
        public function DeleteSocial(Request $request,$id){
            $data = SocialMediaModel::find($id);
            $data->delete();
            $danger = "Your Data has been Delete successfully.";
            $request->session()->put("danger",$danger);
            return back();
        }
        public function EditSocial(Request $request, $id){
            $data = SocialMediaModel::find($id);
            return view('admin.system_settings.social.edit',compact('data'));
        }
        public function EditSocialProcess(Request $request, $id){
            $data = $request->all();
            $Social = SocialMediaModel::find($id);
            $Social->fill($data);
            $Social->save();
            $success = "Your Data has been Updated successfully.";
            $request->session()->put("success",$success);
            return back();
        }
    // Social Media Functions end
    // Main Menu Functions start
        public function ViewMenu(){
            $totalSocial = MainMenuModel::all();
            return view('admin.system_settings.menu.index',compact('totalSocial'));
        }
        public function GetALLFeatureDeleteMenu(Request $request){
            for ($i = 0; $i < count($request->feature); $i++) {
                $data = MainMenuModel::where('id',$request->feature[$i])->first();
                if($request->submit == "delete"){
                    $data->delete();
                }
            }
            return back();
        }
        public function AddMenu(){
            return view('admin.system_settings.menu.add');
        }
        public function AddMenuProcess(Request $request){
            $data = $request->all();
            $Menu = new MainMenuModel;
            $Menu->fill($data);
            $Menu->save();
            $success = "Your Data has Saved successfully.";
            $request->session()->put("success",$success);
            return back();
        }
        public function DeleteMenu(Request $request,$id){
            $data = MainMenuModel::find($id);
            $data->delete();
            $danger = "Your Data has been Delete successfully.";
            $request->session()->put("danger",$danger);
            return back();
        }
        public function EditMenu(Request $request, $id){
            $data = MainMenuModel::find($id);
            return view('admin.system_settings.menu.edit',compact('data'));
        }
        public function EditMenuProcess(Request $request, $id){
            $data = $request->all();
            $Menu = MainMenuModel::find($id);
            $Menu->fill($data);
            $Menu->save();
            $success = "Your Data has been Updated successfully.";
            $request->session()->put("success",$success);
            return back();
        }
    // Main Menu Functions end
    // Main Slider Functions start

        public function ViewSlider(){
            $totalSocial = MainSliderModel::all();
            return view('admin.system_settings.slider.index',compact('totalSocial'));
        }
        public function GetALLFeatureDeleteSlider(Request $request){
            for ($i = 0; $i < count($request->feature); $i++) {
                $data = MainSliderModel::where('id',$request->feature[$i])->first();
                if($request->submit == "delete"){
                    $data->delete();
                }
            }
            return back();
        }
        public function AddSlider(){
            return view('admin.system_settings.slider.add');
        }
        public function AddSliderProcess(Request $request){
            $data = $request->all();
            if ($request->file("image") != null) {
                $path = $request->file("image")->store("Slider_Images");
                $data["image"] = $path;
            }
            $Slider = new MainSliderModel;
            $Slider->fill($data);
            $Slider->save();
            $success = "Your Data has Saved successfully.";
            $request->session()->put("success",$success);
            return back();
        }
        public function DeleteSlider(Request $request,$id){
            $data = MainSliderModel::find($id);
            $data->delete();
            $danger = "Your Data has been Delete successfully.";
            $request->session()->put("danger",$danger);
            return back();
        }
        public function EditSlider(Request $request, $id){
            $data = MainSliderModel::find($id);
            return view('admin.system_settings.slider.edit',compact('data'));
        }
        public function EditSliderProcess(Request $request, $id){
            $data = $request->all();
            if ($request->file("image") != null) {
                $path = $request->file("image")->store("Slider_Images");
                $data["image"] = $path;
            }
            $Slider = MainSliderModel::find($id);
            $Slider->fill($data);
            $Slider->save();
            $success = "Your Data has been Updated successfully.";
            $request->session()->put("success",$success);
            return back();
        }
    // Main Slider Functions end

    // page-content start
        public function ViewPageContent(){
            $data = PageContentModel::all();
            $allBooks = BookModel::orderBy('id','desc')->where('pending',0)->get();
            $allAuthor = UserModel::where('usertype',2)->get();
            $happyCustomer = ClientModel::where('block',0)->get();
            return view('admin.system_settings.homeContent',compact('allBooks','allAuthor','data','happyCustomer'));
        }
        public function ViewPageContentProcess(Request $request){
            $data = $request->all();
            if ($request->file("title") != null) {
                $path = $request->file("title")->store("Banner_Images");
                $data["title"] = $path;
            }
            $home = PageContentModel::where('name',$request->name)->first();
            $home->fill($data);
            $home->save();
            $success = "Your Data has Updated successfully.";
            $request->session()->put("success",$success);
            return back();
        }
    // page-content end

    // footer-content start
        public function ViewFooterContent(){
            $data = FooterContentModel::all();
            return view('admin.system_settings.footer',compact('data'));
        }
        public function ViewFooterContentProcess(Request $request){
            $data = $request->all();
            if ($request->file("fileUpload") != null) {
                $path = $request->file("fileUpload")->store("Footer_Images");
                $data["icon"] = $path;
            }
            if ($request->name == "GetInTouch" || $request->name == "footer2") {
                $data['social_media'] = implode('@',$request->social);
                $data['social_link'] = implode('@',$request->link);
            }
            $footer = FooterContentModel::where('name',$request->name)->first();
            $footer->fill($data);
            $footer->save();
            $success = "Your Data has Updated successfully.";
            $request->session()->put("success",$success);
            return back();
        }
    // footer-content end

    // About start
        public function ViewAboutContent(){
            $data = FooterContentModel::where('name','aboutUs')->first();
            return view('admin.system_settings.about',compact('data'));
        }
        public function ViewAboutContentProcess(Request $request){
            $data = $request->all();
            $data['description'] = htmlentities($request->editor1);
            $footer = FooterContentModel::where('name','aboutUs')->first();
            $footer->fill($data);
            $footer->save();
            $success = "Your Data has Updated successfully.";
            $request->session()->put("success",$success);
            return back();
        }
    // About end
}
