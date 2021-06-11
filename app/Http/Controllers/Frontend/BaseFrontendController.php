<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Settings;
use App\Models\Category;
use App\Models\Page;
use App\Models\AboutUs;


class BaseFrontendController extends Controller
{
    function __construct(){
        $settings = Settings::find(1);
        $categories = Category::where('parent_id', null)->get();
        $pages = Page::where('parent_id', null)->get();
        view()->share(compact('settings','categories','pages'));
    }
}
