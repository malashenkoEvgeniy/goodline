<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductColor;
use App\Models\Category;
use File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;


class ProductController extends Controller
{
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
        return view('admin.product.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $productRequestData = request()->only('vendor_code','aviability','url');

        $product = Product::create($productRequestData);

        if ( request()->file('image') !== null) {
            foreach (request()->file('image') as $image) {
                $fileNewName = time() . $image->getClientOriginalName();
                $image->move(public_path() . '/uploads/product', $fileNewName);
                $categoryRequestData['image'] = '/uploads/product/' . $fileNewName;

                $imageData = [
                    'image'=> $categoryRequestData['image']
                ];

                $product->productImages()->create($imageData);
            }
        }

        $productCategories = request()->only('categories_id');

        if($productCategories !== null){
            foreach($productCategories as $category){
                $product->category()->attach($category);
            }
        }

        $productTranslateRequestData = request()->except('vendor_code','aviability','url','image','categories_id');
        $productTranslate = $product->productTranslate()->create($productTranslateRequestData);


        return redirect()->route('products.create');
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $categories = Category::all();
        $product = Product::find($id);
        $productCategories = $product->category()->get();

        $selectedCategories = array();
        foreach($productCategories as $category){
            $selectedCategories[] = $category->id;
        }

        return view('admin.product.edit',compact('categories','selectedCategories','product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $language = App::getLocale();
        $product = Product::find($id);
        $productTranslate = $product->translate($request['language']); // ищем запись по нашему языку

        $productRequestData = request()->only('vendor_code','aviability','url');

        $productTranslateRequestData = request()->except('vendor_code','aviability','url','image','categories_id');

        if ($productTranslate != null && $productTranslate->language == $language) { // текущий язык сайта совпадает с языком записи (перевод есть) -> обновляем


            $product->update($productRequestData);

            if ( request()->hasFile('image') !== false) {

                foreach (request()->file('image') as $image) {
                    $fileNewName = time() . $image->getClientOriginalName();
                    $image->move(public_path() . '/uploads/product', $fileNewName);
                    $categoryRequestData['image'] = '/uploads/product/' . $fileNewName;

                    $imageData = [
                        'image'=> $categoryRequestData['image']
                    ];

                    $product->productImages()->create($imageData);
                }
            }


            $productTranslate = $productTranslate->update($productTranslateRequestData);



        }else{ // создаём новый перевод
            $product->productTranslate()->create($productTranslateRequestData);
        }



        $productCategories = request()->only('categories_id');
        $product->category()->detach();
        if($productCategories !== null){
            foreach($productCategories as $category){
                $product->category()->attach($category);
            }
        }

        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->category()->detach();

        foreach($product->productImages()->get() as $slide){
            unlink(public_path($slide->image));
            $slide->delete();
        }

        $product->delete();
        return redirect()->back();

    }




    public function destroySlide(Request $request)
    {

        $slide = ProductImage::find($request['id']);
        if ($slide->image !== null && file_exists(public_path($slide->image))) {
            unlink(public_path($slide->image));
        }

        $slide->delete();

        return redirect()->back();

    }

    public function storeColor(Request $request)
    {
        $product = Product::find($request['product_id']);
        $product->productColors()->create($request->only('color'));
        return redirect()->back();
    }

    public function destroyColor(Request $request)
    {
        $color = ProductColor::find($request['color_id']);
        $color->delete();
        return redirect()->back();
    }
}
