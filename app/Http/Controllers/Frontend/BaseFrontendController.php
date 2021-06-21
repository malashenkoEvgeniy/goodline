<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use App\Models\Certificates;
use Illuminate\Http\Request;

use App\Models\Settings;
use App\Models\Category;
use App\Models\Page;
use App\Models\AboutUs;


class BaseFrontendController extends Controller
{
    function __construct(){
        $settings = Settings::find(1);
        $categories = Category::where('parent_id', null)->with('children')->get();
        $pages = Page::where('parent_id', null)->with('getKids')->orderby('order_by')->get();
        $interesting = Page::where('parent_id', 1)->get();
        $certificates = Certificates::get();
        view()->share(compact('settings','certificates', 'categories','interesting', 'pages'));
    }
}
