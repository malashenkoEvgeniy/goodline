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
        $category = $this->getMenu();
        $pages = Page::all();
        view()->share(compact('settings','category','pages'));
    }
}
