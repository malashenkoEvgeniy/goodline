<?php

namespace App\Http\Controllers\Frontend;

use App\Models\TrustUs;
use App\Models\Category;

class CatalogController extends BaseFrontendController
{
	public function __construct(){
        parent::__construct();
    }

    public function index($catalog){
    	$catalog = Category::where('url',$catalog)->first();
    	dd($catalog);
    	$seo = (object) [
            'title' => strip_tags($settings->translate()->seo_title),
            'description' => strip_tags($settings->translate()->seo_description),
            'keywords' => strip_tags($settings->translate()->seo_keywords)
        ];

    dd('cataalog');
    	$trustUs = TrustUs::orderBy('sort')->get();
        return view('frontend.home',compact('trustUs','seo'));
    }
}
