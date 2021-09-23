<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BookCatTypeController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\SystemSettingController;
use App\Http\Controllers\BoardMemberController;
use App\Http\Controllers\SpecialFlashController;
use App\Http\Controllers\LogoFaviconController;
use App\Http\Controllers\FAQController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\MetaTagsController;
use App\Http\Controllers\NewsLetterController;
use App\Http\Controllers\OrderController;-

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::prefix('api')->group(function () {
    Route::get("allBooks",[ApiController::class,"AllBooks"]);
    Route::get("allBookCategories",[ApiController::class,"AllBookCategories"]);
    Route::get("allNews",[ApiController::class,"AllNews"]);
    Route::get("allCartData/{id}",[ApiController::class,"allCartData"]);
    Route::get("allFaqData",[ApiController::class,"AllFaqData"]);
});

// Web Routes
Route::prefix('/')->middleware("IsVisitor")->group(function () {
    Route::get('/',[HomeController::class, 'home']);
    Route::get('/coupon',[HomeController::class, 'home']);
    Route::get('/autocomplete',[HomeController::class, 'autocomplete']);
    Route::post('/autocomplete',[HomeController::class, 'autocomplete']);
    Route::get('/about',[HomeController::class, 'about']);
    Route::get('/author-profile/{id}',[HomeController::class, 'authorprofile']);
    Route::get('/author-signup',[HomeController::class, 'authorSignUp']);
    Route::post('/author-signup',[HomeController::class, 'authorSignUpProcess']);
    Route::get('/all-author',[HomeController::class, 'AllAuthor']);
    Route::get('/contact-us',[HomeController::class, 'contactus']);
    Route::get('/faq',[HomeController::class, 'faq']);
    Route::get('/news',[HomeController::class, 'news']);
    Route::get('/page-not',[HomeController::class, 'pagenot']);
    Route::get('/shoping-cart',[HomeController::class, 'shopingcart']);
    Route::post('/coupon-apply',[CouponController::class, 'CouponApply']);
    Route::get('/single-blog/{id}',[HomeController::class, 'singleblog']);
    Route::post('/commentPost',[HomeController::class, 'CommentPost']);
    Route::get('/book-detail/{id}',[HomeController::class, 'bookdetail']);
    Route::get('/all-book',[HomeController::class, 'allbook']);
    Route::get('/e-book',[HomeController::class, 'Ebook']);
    Route::get('/login',[HomeController::class, 'login']);
    Route::post('/loginProcess',[HomeController::class, 'loginProcess']);
    Route::post('/RegistrationProcess',[HomeController::class, 'RegistrationProcess']);
    Route::get('/logout',[HomeController::class, 'logoutProcess']);
    Route::post('/addToCart/{id}',[HomeController::class, 'AddToCart']);
    Route::post('/CartQuantity/{id}',[HomeController::class, 'CartQuantity']);
    Route::post('/newsletterSubscription', [NewsLetterController::class, 'AddProcess']);
    Route::post('/saveOrder', [OrderController::class, 'saveOrder']);
    Route::get('/orders', [OrderController::class, 'Order']);
    Route::get('/order-detail/{id}', [OrderController::class, 'OrderPreview']);
});
// admin controllers
Route::get('/admin',[UserController::class,"Login"]);
Route::post('/admin',[UserController::class,"ProcessLoginRequest"]);
Route::prefix('admin')->middleware("IsLogin")->group(function () {
    Route::get("logout",[Usercontroller::class,"Logout"]);
    Route::get("change-password",[Usercontroller::class,"changePassword"]);
    Route::post("change-password",[Usercontroller::class,"changePasswordProcess"]);
    Route::get("change-details",[Usercontroller::class,"changeDetail"]);
    Route::post("change-details",[Usercontroller::class,"changeDetailProcess"]);
    // newsLetter Tags
    Route::group(['prefix' => 'newsLetter'],function(){
        Route::get("/",[NewsLetterController::class,"View"]);
        Route::get("/send-mail",[NewsLetterController::class,"SendMail"]);
        Route::get("/send-mail/add",[NewsLetterController::class,"SendMailAdd"]);
        Route::post("/send-mail/add",[NewsLetterController::class,"SendMailAddProcess"]);
    });
    // newsLetter Tags
    Route::group(['prefix' => 'orders'],function(){
        Route::get("/",[OrderController::class,"View"]);
        Route::get("/complete/{id}",[OrderController::class,"OrderCompleted"]);
        Route::get("/detail/{id}",[OrderController::class,"OrderDetail"]);
        Route::get("/send-mail",[OrderController::class,"SendMail"]);
        Route::get("/send-mail/add",[OrderController::class,"SendMailAdd"]);
        Route::post("/send-mail/add",[OrderController::class,"SendMailAddProcess"]);
    });
    // Meta Tags
    Route::group(['prefix' => 'meta-tags'],function(){
        Route::get('/',[MetaTagsController::class,'Index']);
        Route::get('/edit/{id}',[MetaTagsController::class,'Edit']);
        Route::post('/edit/{id}',[MetaTagsController::class,'EditProcess']);
    });
    // Coupon
    Route::prefix('coupon')->group(function () {
        Route::get("/",[CouponController::class,"ViewCoupon"]);
        Route::post("/",[CouponController::class,"GetALLFeatureDeleteCoupon"]);
        Route::get("/add",[CouponController::class,"AddCoupon"]);
        Route::post("/add",[CouponController::class,"AddCouponProcess"]);
        Route::get("/delete/{id}",[CouponController::class,"DeleteCoupon"]);
        Route::get("/update/{id}",[CouponController::class,"EditCoupon"]);
        Route::post("/update/{id}",[CouponController::class,"EditCouponProcess"]);
    });
    // User
    Route::prefix('user')->group(function () {
        Route::get("/",[Usercontroller::class,"View"]);
        Route::get("/add",[Usercontroller::class,"Add"]);
        Route::post("/add",[Usercontroller::class,"AddProcess"]);
        Route::get("/delete/{id}",[Usercontroller::class,"Delete"]);
        Route::get("/active/{id}",[Usercontroller::class,"Active"]);
        Route::get("/Deactive/{id}",[Usercontroller::class,"Deactive"]);
        Route::get("/update/{id}",[Usercontroller::class,"Edit"]);
        Route::post("/update/{id}",[Usercontroller::class,"EditProcess"]);
    });
    // board Member
    Route::prefix('board-member')->group(function () {
        Route::get("/",[BoardMemberController::class,"View"]);
        Route::get("/add",[BoardMemberController::class,"Add"]);
        Route::post("/add",[BoardMemberController::class,"AddProcess"]);
        Route::get("/delete/{id}",[BoardMemberController::class,"Delete"]);
        Route::get("/update/{id}",[BoardMemberController::class,"Edit"]);
        Route::post("/update/{id}",[BoardMemberController::class,"EditProcess"]);
    });

    // Client
    Route::prefix('client')->group(function () {
        Route::get("/",[Usercontroller::class,"ViewClient"]);
        Route::get("/add",[Usercontroller::class,"AddClient"]);
        Route::post("/add",[Usercontroller::class,"AddClientProcess"]);
        Route::get("/block/{id}",[Usercontroller::class,"BlockClient"]);
        Route::get("/unblock/{id}",[Usercontroller::class,"UnBlockClient"]);
        Route::get("/update/{id}",[Usercontroller::class,"EditClient"]);
        Route::post("/update/{id}",[Usercontroller::class,"EditClientProcess"]);
    });

    // book
    Route::prefix('book')->group(function () {
        Route::get("/",[BookController::class,"Index"]);
        Route::post("/",[BookController::class,"GetALLFeatureDelete"]);
        Route::get("/add",[BookController::class,"Add"]);
        Route::post("/add",[BookController::class,"AddProcess"]);
        Route::get("/delete/{id}",[BookController::class,"Delete"]);
        Route::get("/allow/{id}",[BookController::class,"Allow"]);
        Route::get("/update/{id}",[BookController::class,"Edit"]);
        Route::post("/update/{id}",[BookController::class,"EditProcess"]);
        Route::post("/feature/{id}",[BookController::class,"FeatureProcess"]);
        // book Category
        Route::prefix('category')->group(function () {
            Route::get("/",[BookCatTypeController::class,"ViewCategory"]);
            Route::post("/",[BookCatTypeController::class,"GetALLFeatureDeleteCategory"]);
            Route::get("/add",[BookCatTypeController::class,"AddCategory"]);
            Route::post("/add",[BookCatTypeController::class,"AddCategoryProcess"]);
            Route::get("/delete/{id}",[BookCatTypeController::class,"DeleteCategory"]);
            Route::get("/update/{id}",[BookCatTypeController::class,"EditCategory"]);
            Route::post("/update/{id}",[BookCatTypeController::class,"EditCategoryProcess"]);
        });
        // book Type
        Route::prefix('type')->group(function () {
            Route::get("/",[BookCatTypeController::class,"ViewType"]);
            Route::post("/",[BookCatTypeController::class,"GetALLFeatureDeleteType"]);
            Route::get("/add",[BookCatTypeController::class,"AddType"]);
            Route::post("/add",[BookCatTypeController::class,"AddTypeProcess"]);
            Route::get("/delete/{id}",[BookCatTypeController::class,"DeleteType"]);
            Route::get("/update/{id}",[BookCatTypeController::class,"EditType"]);
            Route::post("/update/{id}",[BookCatTypeController::class,"EditTypeProcess"]);
        });
        // book Sale
        Route::prefix('sale')->group(function () {
            Route::get("/",[BookController::class,"ViewSale"]);
            Route::post("/",[BookController::class,"GetALLFeatureDeleteSale"]);
            Route::get("/add",[BookController::class,"AddSale"]);
            Route::post("/add",[BookController::class,"AddSaleProcess"]);
            Route::get("/delete/{id}",[BookController::class,"DeleteSale"]);
            Route::get("/update/{id}",[BookController::class,"EditSale"]);
            Route::post("/update/{id}",[BookController::class,"EditSaleProcess"]);
        });
        // book Flash Sale
        Route::prefix('flash')->group(function () {
            Route::get("/",[SpecialFlashController::class,"ViewFlash"]);
            Route::post("/",[SpecialFlashController::class,"GetALLFeatureDeleteFlash"]);
            Route::get("/add",[SpecialFlashController::class,"AddFlash"]);
            Route::post("/add",[SpecialFlashController::class,"AddFlashProcess"]);
            Route::get("/delete/{id}",[SpecialFlashController::class,"DeleteFlash"]);
            Route::get("/update/{id}",[SpecialFlashController::class,"EditFlash"]);
            Route::post("/update/{id}",[SpecialFlashController::class,"EditFlashProcess"]);
        });
        // book Special Sale
        Route::prefix('special')->group(function () {
            Route::get("/",[SpecialFlashController::class,"ViewSpecial"]);
            Route::post("/",[SpecialFlashController::class,"GetALLFeatureDeleteSpecial"]);
            Route::get("/add",[SpecialFlashController::class,"AddSpecial"]);
            Route::post("/add",[SpecialFlashController::class,"AddSpecialProcess"]);
            Route::get("/delete/{id}",[SpecialFlashController::class,"DeleteSpecial"]);
            Route::get("/update/{id}",[SpecialFlashController::class,"EditSpecial"]);
            Route::post("/update/{id}",[SpecialFlashController::class,"EditSpecialProcess"]);
        });
    });
    // faq
    Route::prefix('faq')->group(function () {
        Route::get("/",[FAQController::class,"Index"]);
        Route::post("/",[FAQController::class,"GetALLFeatureDelete"]);
        Route::get("/add",[FAQController::class,"Add"]);
        Route::post("/add",[FAQController::class,"AddProcess"]);
        Route::get("/delete/{id}",[FAQController::class,"Delete"]);
        Route::get("/update/{id}",[FAQController::class,"Edit"]);
        Route::post("/update/{id}",[FAQController::class,"EditProcess"]);
        // faq Category
        Route::prefix('category')->group(function () {
            Route::get("/",[FAQController::class,"ViewCategory"]);
            Route::post("/",[FAQController::class,"GetALLFeatureDeleteCategory"]);
            Route::get("/add",[FAQController::class,"AddCategory"]);
            Route::post("/add",[FAQController::class,"AddCategoryProcess"]);
            Route::get("/delete/{id}",[FAQController::class,"DeleteCategory"]);
            Route::get("/update/{id}",[FAQController::class,"EditCategory"]);
            Route::post("/update/{id}",[FAQController::class,"EditCategoryProcess"]);
        });
    });

    // Author
    Route::prefix('author')->group(function () {
        Route::get("/",[AuthorController::class,"ViewAuthor"]);
        Route::post("/",[AuthorController::class,"GetALLFeatureDeleteAuthor"]);
        Route::get("/add",[AuthorController::class,"AddAuthor"]);
        Route::post("/add",[AuthorController::class,"AddAuthorProcess"]);
        Route::get("/delete/{id}",[AuthorController::class,"DeleteAuthor"]);
        Route::get("/update/{id}",[AuthorController::class,"EditAuthor"]);
        Route::post("/update/{id}",[AuthorController::class,"EditAuthorProcess"]);
    });

    // News
    Route::prefix('news')->group(function () {
        Route::get("/",[NewsController::class,"ViewNews"]);
        Route::post("/",[NewsController::class,"GetALLFeatureDeleteNews"]);
        Route::get("/add",[NewsController::class,"AddNews"]);
        Route::post("/add",[NewsController::class,"AddNewsProcess"]);
        Route::get("/delete/{id}",[NewsController::class,"DeleteNews"]);
        Route::get("/allow/{id}",[NewsController::class,"AllowNews"]);
        Route::get("/update/{id}",[NewsController::class,"EditNews"]);
        Route::post("/update/{id}",[NewsController::class,"EditNewsProcess"]);
    });

    // system-setting
    Route::prefix('system-settings')->group(function () {
        // Logo & Favicon
        Route::prefix('logo-favicon')->group(function () {
            Route::get("/",[LogoFaviconController::class,"View"]);
            Route::post("/add",[LogoFaviconController::class,"AddProcess"]);
            Route::get("/delete/{id}",[LogoFaviconController::class,"Delete"]);
            Route::get("/update/{id}",[LogoFaviconController::class,"Edit"]);
            Route::post("/update/{id}",[LogoFaviconController::class,"EditProcess"]);
            Route::post("/active/{id}",[LogoFaviconController::class,"Active"]);
        });
            Route::get("/logo/add",[LogoFaviconController::class,"LogoAdd"]);
            Route::get("/favicon/add",[LogoFaviconController::class,"FaviconAdd"]);
        // home-page-content
        Route::prefix('home-page-content')->group(function () {
            Route::get("/",[SystemSettingController::class,"ViewPageContent"]);
            Route::post("/",[SystemSettingController::class,"ViewPageContentProcess"]);
        });
        // footer
        Route::prefix('footer')->group(function () {
            Route::get("/",[SystemSettingController::class,"ViewFooterContent"]);
            Route::post("/",[SystemSettingController::class,"ViewFooterContentProcess"]);
        });
        // About
        Route::prefix('about')->group(function () {
            Route::get("/",[SystemSettingController::class,"ViewAboutContent"]);
            Route::post("/",[SystemSettingController::class,"ViewAboutContentProcess"]);
        });
        // testimonial
        Route::prefix('testimonial')->group(function () {
            Route::get("/",[SystemSettingController::class,"ViewTestimonial"]);
            Route::post("/",[SystemSettingController::class,"GetALLFeatureDeleteTestimonial"]);
            Route::get("/add",[SystemSettingController::class,"AddTestimonial"]);
            Route::post("/add",[SystemSettingController::class,"AddTestimonialProcess"]);
            Route::get("/delete/{id}",[SystemSettingController::class,"DeleteTestimonial"]);
            Route::get("/update/{id}",[SystemSettingController::class,"EditTestimonial"]);
            Route::post("/update/{id}",[SystemSettingController::class,"EditTestimonialProcess"]);
        });
        // social-media
        Route::prefix('social-media')->group(function () {
            Route::get("/",[SystemSettingController::class,"ViewSocial"]);
            Route::post("/",[SystemSettingController::class,"GetALLFeatureDeleteSocial"]);
            Route::get("/add",[SystemSettingController::class,"AddSocial"]);
            Route::post("/add",[SystemSettingController::class,"AddSocialProcess"]);
            Route::get("/delete/{id}",[SystemSettingController::class,"DeleteSocial"]);
            Route::get("/update/{id}",[SystemSettingController::class,"EditSocial"]);
            Route::post("/update/{id}",[SystemSettingController::class,"EditSocialProcess"]);
        });
        // main menu
        Route::prefix('main-menu')->group(function () {
            Route::get("/",[SystemSettingController::class,"ViewMenu"]);
            Route::post("/",[SystemSettingController::class,"GetALLFeatureDeleteMenu"]);
            Route::get("/add",[SystemSettingController::class,"AddMenu"]);
            Route::post("/add",[SystemSettingController::class,"AddMenuProcess"]);
            Route::get("/delete/{id}",[SystemSettingController::class,"DeleteMenu"]);
            Route::get("/update/{id}",[SystemSettingController::class,"EditMenu"]);
            Route::post("/update/{id}",[SystemSettingController::class,"EditMenuProcess"]);
        });
        // main slider
        Route::prefix('main-slider')->group(function () {
            Route::get("/",[SystemSettingController::class,"ViewSlider"]);
            Route::post("/",[SystemSettingController::class,"GetALLFeatureDeleteSlider"]);
            Route::get("/add",[SystemSettingController::class,"AddSlider"]);
            Route::post("/add",[SystemSettingController::class,"AddSliderProcess"]);
            Route::get("/delete/{id}",[SystemSettingController::class,"DeleteSlider"]);
            Route::get("/update/{id}",[SystemSettingController::class,"EditSlider"]);
            Route::post("/update/{id}",[SystemSettingController::class,"EditSliderProcess"]);
        });
    });
});
