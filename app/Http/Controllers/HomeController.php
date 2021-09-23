<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClientModel;
use App\Models\PageContentModel;
use App\Models\MainSliderModel;
use App\Models\UserModel;
use App\Models\UserInformationModel;
use App\Models\FooterContentModel;
use App\Models\BookModel;
use App\Models\NewsModel;
use App\Models\BoardMemberModel;
use App\Models\SaleModel;
use App\Models\SpecialOfferModel;
use App\Models\FlashSaleModel;
use App\Models\FAQCategoryModel;
use App\Models\FAQModel;
use App\Models\CommentModel;
use App\Models\TestimonialModel;
use App\Models\AddToCartModel;
use App\Models\MetaTagsModel;
use Hash;

class HomeController extends Controller
{
    // home page
    public function home(Request $request){
        $totalTestimonial = TestimonialModel::all();
        $HomeContent = PageContentModel::all();
        $MainSlider = MainSliderModel::all();
        $happyCustomer = ClientModel::where('block',0)->get();
        $AllSale = SaleModel::orderBy('id','desc')->get();
        $featuredBook = BookModel::orderBy('id','desc')->where('feature',1)->where('pending',0)->take(6)->get();
        $recommdedAllBook = BookModel::orderBy('id','desc')->where('recommded_all',1)->where('pending',0)->get();
        $recommdedOnlyBook = BookModel::orderBy('id','desc')->where('recommded_only',1)->where('pending',0)->get();
        $SpecialOfferBooks = SpecialOfferModel::orderBy('id','desc')->get();
        $FlashSaleTime = FlashSaleModel::where('endTime','>',date('Y-m-d H:i:s'))->get();
        if(count($FlashSaleTime) > 0){
            $endTime = $FlashSaleTime[0]->endTime;
            $FlashSaleBooks = FlashSaleModel::where('endTime',$endTime)->get();
        }else {
            $FlashSaleBooks = null;
        }
        $allBooks = BookModel::orderBy('id','desc')->where('pending',0)->get();
        $allAuthor = UserModel::where('usertype',2)->where('pending',0)->get();
        $allNews = NewsModel::orderBy('id','desc')->where('pending',0)->take(4)->get();
        $meta = MetaTagsModel::where('name_page','Home')->first();
        return view('web.home.index',compact('allBooks','allAuthor','FlashSaleTime','HomeContent','MainSlider','AllSale','featuredBook','recommdedAllBook','recommdedOnlyBook','FlashSaleBooks','SpecialOfferBooks','allNews','totalTestimonial','happyCustomer','meta'));
    }

    // Registration page
    public function RegistrationProcess(Request $request){
        $data = ClientModel::where('email',$request->email)->first();
        if ($data == null) {
            $hashed = Hash::make($request->password);
            $data = $request->all();
            $data['password'] = $hashed;
            $client = new ClientModel;
            $client->fill($data);
            $client->save();
            return back()->with("success","Your Account has been Register successfully.");
        }else{
            return back()->with("danger","Your Account has been Register Already.");
        }
    }
    // Login Process
    public function LoginProcess(Request $request){
        $data = ClientModel::where('email',$request->email)->first();
        if ($data != null) {
            $passwordhash = $data->password;

            if(Hash::check($request->password,$data->password)){
                if($data->block == 0){
                    $request->session()->put("onlineClient",$data);
                    $clientInfo =  $request->session()->get("onlineClient");
                    if($request->session()->has("uniqid")){
                        $uniqid =  $request->session()->get("uniqid");
                        $idd = $uniqid;
                        $cartOld = AddToCartModel::where('sessionId',$idd)->get();
                        foreach ($cartOld as $cart) {
                            $cart->userId = $clientInfo->id;
                            $cart->save();
                        }
                    }
                    return redirect("/")->with("success","You Log In successfully.");
                }else{
                    $danger = "Your Account is block.";
                }
            }else{
                $danger = "Your password is not match.";
            }
        }else{
            $danger = "Your Email is not exist.";
        }
        return back()->with("danger",$danger);
    }
    // logout Process
    public function logoutProcess(Request $request){
        if($request->session()->has("onlineClient")){
            $request->session()->pull("onlineClient");
        }
        return back();
    }

    // about Page
    public function about(){
        $AboutContent = FooterContentModel::where('name','aboutUs')->first();
        $memberBoard = BoardMemberModel::inRandomOrder()->limit(4)->get();
        $meta = MetaTagsModel::where('name_page','About Us')->first();
        return view('web.about.index',compact('AboutContent','memberBoard','meta'));
    }

    // author apge
    public function authorprofile(Request $request,$id){
        $otherAuthor = UserModel::inRandomOrder()->where('usertype',2)->where('id','!=',$id)->where('pending',0)->limit(6)->get();
        $Author = UserModel::where('id',$id)->where('usertype',2)->where('pending',0)->first();
        if($Author){
            $AuthorDetail = UserInformationModel::where('userId',$id)->first();
            $Books = BookModel::where('authorId',$id)->where('pending',0)->get();
            return view('web.author.index',compact('AuthorDetail','Author','Books','otherAuthor'));
        }else{
            return back()->with("danger","Wrong Author Id.");
        }
    }

    // author all page
    public function AllAuthor(Request $request){
        $meta = MetaTagsModel::where('name_page','Author List')->first();
        $totalAuthor = UserModel::where('usertype',2)->where('pending',0)->get();
        return view('web.author.all',compact('totalAuthor','meta'));
    }
     // Contatc apge
     public function contactus(){
        $meta = MetaTagsModel::where('name_page','Contact Us')->first();
        return view('web.contact-us.index',compact('meta'));
    }

    // FAQ apge
    public function faq(){
        $totalData = FAQModel::all();
        $totalCategory = FAQCategoryModel::all();
        $meta = MetaTagsModel::where('name_page','FAQ')->first();
        return view('web.faq.index',compact('totalCategory','totalData','meta'));
    }

    // NEWS apge
    public function news(){
        $totalNews = NewsModel::where('pending',0)->get();
        $meta = MetaTagsModel::where('name_page','News List')->first();
        return view('web.news.index',compact('totalNews','meta'));
    }

    // Page not foundapge
    public function pagenot(){
        return view('web.page-not.index');
    }

    // shoping cart foundapge
    public function shopingcart(Request $request){
        if($request->session()->has("onlineClient")){
            $meta = MetaTagsModel::where('name_page','Shoping Cart')->first();
            $clientInfo =  $request->session()->get("onlineClient");
            $cartOld = AddToCartModel::where('userId',$clientInfo->id)->get();
            return view('web.shoping-cart.index',compact('cartOld','meta'));
        }elseif($request->session()->has("uniqid")){
            $meta = MetaTagsModel::where('name_page','Shoping Cart')->first();
            $uniqid =  $request->session()->get("uniqid");
            $cartOld = AddToCartModel::where('sessionId',$uniqid)->get();
            return view('web.shoping-cart.index',compact('cartOld','meta'));
        }else{
            return redirect('/')->with("danger","Your are not Login. Please! Login First");
        }
    }

    // single blog foundapge
    public function singleblog(Request $request,$id){
        $news = NewsModel::find($id);
        $comment = CommentModel::orderBy('id','desc')->where('replyId',null)->where('newsId',$id)->get();
        $TotalComments = CommentModel::orderBy('id','desc')->where('newsId',$id)->get();
        $author = UserInformationModel::where('userId',$news->authorId)->first();
        $OtherNews = NewsModel::inRandomOrder()->where('id','!=',$id)->where('pending',0)->limit(3)->get();
        return view('web.single-blog.index',compact('news','author','OtherNews','comment','TotalComments'));
    }
    // Comment Post
    public function CommentPost(Request $request){
        $data = $request->all();
        $comment = new CommentModel;
        $comment->fill($data);
        $comment->save();
        return back();
    }

     //  Book detail foundapge
     public function bookdetail(Request $request,$id){
        $BookDetail = BookModel::find($id);
        return view('web.book-detail.index',compact('BookDetail'));
    }

    //  All Book foundapge
    public function allbook(){
        $meta = MetaTagsModel::where('name_page','All Books')->first();
        $pages = BookModel::orderBy('id','desc')->where('pending',0)->paginate(12);
        return view('web.books.books',compact('pages','meta'));
    }

    //  All E Book foundapge
    public function Ebook(){
        $meta = MetaTagsModel::where('name_page','E Books')->first();
        $pages = BookModel::orderBy('id','desc')->where('pending',0)->where('typeId',1)->paginate(12);
        return view('web.books.books',compact('pages','meta'));
    }

    //  Login  foundapge
    public function login(){
        return view('web.login-form.index');
    }
    // Add to Cart Function
    public function AddToCart(Request $request,$id){
        if($request->session()->has("onlineClient")){
            $clientInfo =  $request->session()->get("onlineClient");
            $idd = $clientInfo->id;
            $cartOld = AddToCartModel::where('userId',$idd)->where('productId',$id)->first();
            if ($cartOld == null) {
                $cartnew = new AddToCartModel;
                $cartnew->productId = $id;
                $cartnew->userId = $idd;
                $cartnew->save();
            }else{
                $cartOld->quantity += 1;
                $cartOld->save();
            }
            return "success";
        }elseif($request->session()->has("uniqid")){
            $uniqid =  $request->session()->get("uniqid");
            $idd = $uniqid;
            $cartOld = AddToCartModel::where('sessionId',$idd)->where('productId',$id)->first();
            if ($cartOld == null) {
                $cartnew = new AddToCartModel;
                $cartnew->productId = $id;
                $cartnew->sessionId = $idd;
                $cartnew->save();
            }else{
                $cartOld->quantity += 1;
                $cartOld->save();
            }
            return "success";
        }else {
            return "error";
        }
    }
    // Add to Cart Quantity Function
    public function CartQuantity(Request $request,$id){
        $data = $request->all();
        if($data['value'] != null && $data['value'] > 0){
            $cartOld = AddToCartModel::find($id);
            if ($cartOld) {
                $cartOld->quantity = $data['value'];
                $cartOld->save();
                return "success";
            }
        }else {
            $return = array("error","Quantity must be more than zero.");
            return $return;
        }
    }
    //  Author Sign Up foundapge
        public function authorSignUp(Request $request){
            return view('web.author.signUp');
        }
        public function authorSignUpProcess(Request $request){
            $data = $request->all();
            $data['pending'] = 1;
            $data['password'] = Hash::make($request->password);
            $data['usertype'] = 2;
            $User = new UserModel;
            $User->fill($data);
            $User->save();
            $data['userId'] = $User->id;
            $UserInfo = new UserInformationModel;
            $UserInfo->fill($data);
            $UserInfo->save();
            return back()->with("success","Your registration has been successfull. Admin will active you.");
        }
    //  Author Sign Up foundapge

    //  AutoComplete Start
   public function autocomplete(Request $request)
    {
        $search = $request->input;
            $books = BookModel::select("name")
            		  ->where('name', 'LIKE', "%$search%")
            		  ->get();
        return response()->json($books);
    }
   //  AutoComplete ens
}
