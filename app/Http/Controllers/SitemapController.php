<?php

namespace App\Http\Controllers;


use App\Models\Category;
use App\Models\MainPage;
use App\Models\Model;
use App\Models\Page;
use App\Models\Product;
use App\Models\Project;
use App\Models\Settings;
use Illuminate\Http\Request;

class SitemapController extends Controller
{
    public function index(Request $r)
    {

        $main_page = Settings::onWriteConnection()->find(1);
        $pages = Page::orderBy('id','desc')->get();
        $categories = Category::orderBy('id','desc')->get();
        $products = Product::orderBy('id','desc')->get();
        return response()->view('sitemap', compact(
                    'main_page',
            'pages',
            'categories',
            'products'
        ))
            ->header('Content-Type', 'text/xml');

    }
}
