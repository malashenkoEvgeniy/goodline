<?php

namespace App\Http\Controllers\Admin;

use App\Models\Page;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class PageController extends  BaseController
{
    protected $storePath = '/uploads/pages/';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::all();
        return view('admin.pages.index',compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pages = Page::whereIn('id', [1, 2])->get();

        return view('admin.pages.create', compact('pages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'parent_id' => 'required',
        ], [
            'parent_id.required' => 'Поле "родительская страница" обязательно для заполнения',
        ]);
        $req = $request->only('parent_id');
        $req['url'] = SlugService :: createSlug ( Page :: class, 'url' , $request->title );
        if (request()->file('image') !== null) {
            $file = $this->storeFile(request()->file('image'), $this->storePath);
            $req['image'] = $file['path'];
        }
        $page = Page::create($req);
        $pageTranslate = $page->pageTranslate()->create($request->except('url', 'parent_id', 'image'));

        return redirect()->route('pages.index')->with('success', 'Запись успешно создана');
    }

    public function edit($id)
    {
        $page = Page::find($id);
        $page_parents = ($id>5) ? Page::whereIn('id', [1, 2])->get() : null;
        return view('admin.pages.edit',compact('page', 'page_parents'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $page = Page::find($id);
        $language = App::getLocale();
        $pageTranslate = $page->translate($request['language']); // ищем запись по нашему языку
        $pageRequestData = request()->only('parent_id');
        $pageTranslateRequestData = request()->except( 'parent_id');
        if (request()->file('image') !== null) {
            $this->deleteFile($page->image);
            $file = $this->storeFile(request()->file('image'), $this->storePath);
            $page->image = $file['path'];
            $page->update(['image' => $page->image]);
        }

        if ($pageTranslate != null && $pageTranslate->language == $language) { // текущий язык сайта совпадает с языком записи (перевод есть) -> обновляем
            $pageTranslate->update($pageTranslateRequestData);
        }else{ // создаём новый перевод
            $page->pageTranslate()->create($pageTranslateRequestData);
        }

        $page->update($pageRequestData);

        return redirect()->back();
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $page = Page::destroy($id);

        return redirect()->route('pages.index')->with('success', 'Запись успешно удалена');
    }
}
