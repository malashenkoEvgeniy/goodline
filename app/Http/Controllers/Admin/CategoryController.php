<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menuitems = $this->getMenu();
        return view('admin.categories.index',compact('menuitems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menuitems = Category::all();
        return view('admin.categories.create', compact('menuitems'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $categoryRequestData = request()->only('parent_id','url','image');

        if (isset($categoryRequestData['image'])) {
            $originalFile = request()->file('image');
            $originalFileNewName = time() . $originalFile->getClientOriginalName();
            $originalFile->move(public_path() . '/uploads/categories', $originalFileNewName);
            $categoryRequestData['image'] = '/uploads/categories/' . $originalFileNewName;
        }

        $category = Category::create($categoryRequestData);

        $categoryTranslateRequestData = request()->except('parent_id','url','image','_token');

        $categoryTranslate = $category->categoryTranslate()->create($categoryTranslateRequestData);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $menuitems = $this->getMenu();
        $category = Category::find($id);

        $parent = $category->parent()->get();

        return view('admin.categories.edit',compact('category','parent','menuitems'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $requestData = request()->all();
        $language = App::getLocale();

        $category = Category::find($id);

        $categoryTranslate = $category->translate($requestData['language']); // ищем запись по нашему языку

        $categoryRequestData = request()->only('parent_id','url','image');

        $categoryTranslateRequestData = request()->except('parent_id','url','image','_token');


        if ($categoryTranslate != null && $categoryTranslate->language == $language) { // текущий язык сайта совпадает с языком записи (перевод есть) -> обновляем

            if (isset($requestData['image']) ) { // загрузили картинку
                if($category->image !== null){
                    unlink(public_path($category->image));
                }
                $originalFile = request()->file('image');
                $originalFileNewName = time() . $originalFile->getClientOriginalName();
                $originalFile->move(public_path() . '/uploads/categories', $originalFileNewName);
                $categoryRequestData['image'] = '/uploads/categories/' . $originalFileNewName;
            }

            $category = $category->update($categoryRequestData);

            $categoryTranslate = $categoryTranslate->update($categoryTranslateRequestData);

        }else{ // создаём новый перевод
            $category->categoryTranslate()->create($categoryTranslateRequestData);
        }

        return redirect()->back();

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $category = Category::find($id);

        $category->products()->detach();

        if($category->image !== null){
            unlink(public_path($category->image));
        }



        $category->delete();

        $menu = Category::all();

        foreach ($menu as $item) {
            $parent = $item->parent()->get();
            if ( count($parent) == 0 && $item->parent_id !== null) {
                $item->parent_id = null;
                $item->save();
            }
        }

        return redirect('/admin/categories');
    }
}
