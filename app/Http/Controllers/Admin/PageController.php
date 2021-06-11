<?php

namespace App\Http\Controllers\Admin;

use App\Models\Page;
use App\Http\Controllers\Controller;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class PageController extends Controller
{
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
        $pages = Page::where('parent_id', null)->get();
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
        $req = $request->only('parent_id');
        $req['url'] = SlugService :: createSlug ( Page :: class, 'url' , $request->title );
        $page = Page::create(['parent_id'=>$req['parent_id'], 'url'=>$req['url']]);
        $pageTranslate = $page->pageTranslate()->create($request->except('url', 'parent_id'));

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page = Page::find($id);
        return view('admin.pages.edit',compact('page'));
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
        $pageRequestData = request()->only('url');
        $pageTranslateRequestData = request()->except('url');


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

        return redirect()->route('pages.index');
    }
}
