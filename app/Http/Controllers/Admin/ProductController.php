<?php

namespace App\Http\Controllers\Admin;

use App\Models\Characteristics;
use App\Models\Media;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Category;
use App\Services\BaseService;
use App\Services\ProductService;
use Cviebrock\EloquentSluggable\Services\SlugService;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends BaseController
{

    public function __construct()
    {
        parent::__construct();
    }
    protected $storePath = '/uploads/category/';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $characteristics = Characteristics::get();
        return view('admin.product.create',compact('categories', 'characteristics'));
    }


    public function store(Request $request)
    {

        $this->validate($request, [
            'short_des' => 'nullable|min:2|max:255',
        ], [
            'short_des.max' => 'Поле "Краткое описание" должны быть не больше 255 символов',
            'short_des.min' => 'Поле "Краткое описание" должны быть не менее 2 символов',
        ]);

        $req = request()->only('vendor_code','url');
        $req['url'] = SlugService :: createSlug ( Product :: class, 'url' , $request->title );

        $reqT = request()->except('vendor_code', 'url','image','categories_id', 'properties');
        $product = $this->storeWithTranslation(new Product(), $req, $reqT);
        if ( request()->file('image') !== null) {
            foreach (request()->file('image') as $image) {
                ProductService::create_media($product['model'], $image, ProductService::STORE_PATH, ProductService::PARAMETERS);
            }
        }

        if($request->properties !== null){
            $characteristics = Characteristics::find(array_keys($request->properties));
            $product['model']->properties()->attach($characteristics);
        }

        $productCategories = request()->only('categories_id');

        if($productCategories !== null){
            foreach($productCategories as $category){
                $product['model']->category()->attach($category);
            }
        }

        return redirect()->route('products.index')->with('success', 'Запись успешно создана');
    }


    public function edit( $id)
    {
        $categories = Category::all();
        $product = Product::find($id);
        $productCategories = $product->category()->get();
        $characteristics = Characteristics::get();
        $selectedCategories = array();
        $productProperties = DB::table('characteristics_product')->where('product_id', $id)->get();
        foreach($productCategories as $category){
            $selectedCategories[] = $category->id;
        }
        return view('admin.product.edit',compact('categories','characteristics','productProperties', 'selectedCategories','product'));
    }


    public function update(Request $request, $id)
    {
        $req = request()->only('vendor_code','url');
        $reqT = request()->except('vendor_code', 'url','image','categories_id', 'properties');
        $product = Product::find($id);
        if ( request()->file('image') !== null) {
            foreach (request()->file('image') as $image) {
                ProductService::create_media($product, $image, ProductService::STORE_PATH, ProductService::PARAMETERS);
            }
        }

        $product->update($req);

        $this->updateTranslation($product, $reqT, $request);

        $productCategories = request()->only('categories_id');
        $product->category()->detach();
        if($productCategories !== null){
            foreach($productCategories as $category){
                $product->category()->attach($category);
            }
        }

        if($request->properties !== null){
            $product->properties()->detach();
            $characteristics = Characteristics::find(array_keys($request->properties));
            $product->properties()->attach($characteristics);
        }

        return redirect()->route('products.index')->with('success', 'Запись успешно создана');
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->category()->detach();
        $product->properties()->detach();
        foreach($product->media as $slide){
            ProductService::delete_media($slide);
            $slide->delete();
        }
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Запись успешно удалена');
    }

    public function destroySlide(Request $request)
    {
        $media = Media::find($request['id']);
       ProductService::delete_media($media);
        $media->delete();

        return redirect()->back();
    }
}
