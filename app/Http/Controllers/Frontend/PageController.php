<?php

namespace App\Http\Controllers\Frontend;

use App\Models\AboutUs;
use App\Models\AboutUsItems;
use App\Models\Category;
use App\Models\HomeSlider;
use App\Models\Page;
use App\Models\Product;
use App\Models\Settings;
use App\Models\TrustUs;
use App\Models\WorkExample;
use App\Models\WorkExampleImage;
use Illuminate\Support\Facades\App;

class PageController extends BaseFrontendController
{


    public function __construct(){
        parent::__construct();

    }

    public function index(){
    	$settings = Settings::find(1);
    	$seo = (object) [
            'title' => strip_tags($settings->translate()->seo_title),
            'description' => strip_tags($settings->translate()->seo_description),
            'keywords' => strip_tags($settings->translate()->seo_keywords)
        ];
    	$interesting = Page::where('parent_id', 1)->get();

    	$homeSliders = HomeSlider::all();
    	$workExamples = WorkExampleImage::orderBy('sort')->get();
    	$trustUs = TrustUs::orderBy('sort')->get();
        return view('frontend.home',compact('homeSliders','workExamples','trustUs', 'interesting','seo'));
    }



    public function page($url){
    	$page = Page::where('url',$url)->first();
    	$category = Category::where('url',$url)->first();
    	$product = Product::where('url',$url)->first();


    	if ($page !== null) { // Текстовая страница

    		return $this->showPage($page);

    	}elseif($category !== null ){ // Страница каталога

    		return $this->showCategory($category);

    	}elseif($product !== null ){ // Страница продукта

    		return $this->showProduct($product);

    	}else{
    		App::abort(404);
    	}
    }






    public function showPage($page){
    	$seo = (object) [
            'title' => strip_tags($page->translate()->seo_title),
            'description' => strip_tags($page->translate()->seo_description),
            'keywords' => strip_tags($page->translate()->seo_keywords)
        ];

        $breadcrumbs = (object) [
            'current' => strip_tags($page->translate()->title),
            'parent' => null
        ];

        return view('frontend.page',compact('seo','page','breadcrumbs'));
    }



    public function showCategory($category){

        $products = $category->products()->paginate(24);

    	$seo = (object) [
            'title' => strip_tags($category->translate()->seo_title),
            'description' => strip_tags($category->translate()->seo_description),
            'keywords' => strip_tags($category->translate()->seo_keywords)
        ];

        $parents = $this->findAllParents($category);
        $parent = $category->parent()->get();


        $categoryChildren = $category->children()->get();
        $parentCategoryChildren = null;

        if (count($parent) != 0) {
        	$parentCategoryChildren = $parent['0']->children()->get();
        }


        $breadcrumbs = (object) [
            'current' => strip_tags($category->translate()->page_title),
            'parent' => $parents
        ];

        $page = $category;

        $quantityProducts = count($page->products()->get());

        return view('frontend.catalog', compact('quantityProducts','page','seo','breadcrumbs','products','categoryChildren','parentCategoryChildren'));
    }

    public function findAllParents($currentCategory){
    	$parents = collect([]);

        $parent = $currentCategory->parent()->get();

	    if (count($parent) != 0)  {
		    while(count($parent) != 0) {
		        $parents->push($parent['0']);
		        $parent = $parent['0']->parent()->get();
		    }
		    return $parents;
	    }else{
	    	return null;
	    }
    }



    public function showProduct($product){

        $productCategoryUrl = explode('/',url()->previous());
        if(!isset($productCategoryUrl['3'])){
            $productCategoryUrl = explode('/',url()->full());
        }

        $category = Category::where('url', $productCategoryUrl['3'])->first();
        if($category !== null){ // со страницы категории
            $parents = collect([]);

            $parent = $category;

            while(count($parent) != 0) {
                $parents->push($parent);
                $parent = $parent->parent()->first();
            }

            $parents = $parents->reverse();

        }else{ // по прямой ссылке

            $parents = $product->category()->get();

        }


    	$seo = (object) [
            'title' => strip_tags($product->translate()->seo_title),
            'description' => strip_tags($product->translate()->seo_description),
            'keywords' => strip_tags($product->translate()->seo_keywords)
        ];

        $breadcrumbs = (object) [
            'current' => strip_tags($product->translate()->title),
            'parent' => $parents
        ];

    	$trustUs = TrustUs::orderBy('sort')->get();


        return view('frontend.product',compact('seo','product','breadcrumbs','trustUs'));
    }


    public function examples(){
        $page = WorkExample::find(1);
        $images = WorkExampleImage::orderBy('sort')->paginate(24);

    	$seo = (object) [
            'title' => strip_tags($page->translate()->seo_title),
            'description' => strip_tags($page->translate()->seo_description),
            'keywords' => strip_tags($page->translate()->seo_keywords)
        ];

        $breadcrumbs = (object) [
            'current' => strip_tags($page->translate()->title),
            'parent' => null
        ];


        return view('frontend.examples',compact('seo','page','images','breadcrumbs'));
    }


    public function contacts(){
        $page = Settings::find(1);
        if(App::getLocale() == 'ru'){
            $title = "Контакты";
        }else{
            $title = "Contacts";

        }

    	$seo = (object) [
            'title' => strip_tags($page->translate()->seo_title),
            'description' => strip_tags($page->translate()->seo_description),
            'keywords' => strip_tags($page->translate()->seo_keywords)
        ];


        $breadcrumbs = (object) [
            'current' => $title,
            'parent' => null
        ];


        return view('frontend.contact_us',compact('seo','page','breadcrumbs'));
    }





}
