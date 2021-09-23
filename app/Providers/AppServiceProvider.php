<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\SocialMediaModel;
use App\Models\FooterContentModel;
use App\Models\BookCategoryModel;
use App\Models\MainMenuModel;
use App\Models\LogoFaviconModel;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->share("socialMediaInfo",SocialMediaModel::all());
        view()->share("FooterContent",FooterContentModel::all());
        view()->share("MainMenu",MainMenuModel::all());
        view()->share("logo",LogoFaviconModel::where('name','Logo')->where('active',1)->first());
        view()->share("favicon",LogoFaviconModel::where('name','Favicon')->where('active',1)->first());
        view()->share("AllBookCategories",BookCategoryModel::all());
    }
}
