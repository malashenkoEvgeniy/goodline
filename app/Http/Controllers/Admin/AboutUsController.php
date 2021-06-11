<?php

namespace App\Http\Controllers\Admin;

use App\Models\AboutUs;
use App\Models\AboutUsItems;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class AboutUsController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aboutUsItems = AboutUsItems::all();
        $aboutUs = AboutUs::find(1);
        return view('admin.about_us.index',compact('aboutUs','aboutUsItems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AboutUs  $aboutUs
     * @return \Illuminate\Http\Response
     */
    public function show(AboutUs $aboutUs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AboutUs  $aboutUs
     * @return \Illuminate\Http\Response
     */
    public function edit(AboutUs $aboutUs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AboutUs  $aboutUs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $language = App::getLocale();

        $aboutUs = AboutUs::find(1);

        $aboutUsTranslate = $aboutUs->translate($request['language']); // ищем запись по нашему языку

        if ($aboutUsTranslate != null && $aboutUsTranslate->language == $language) { // текущий язык сайта совпадает с языком записи (перевод есть) -> обновляем
            $aboutUsTranslate->update(request()->except('_method','_token'));
        }else{ // создаём новый перевод
            $aboutUs->aboutUsTranslates()->create(request()->except('_method','_token'));
        }

        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AboutUs  $aboutUs
     * @return \Illuminate\Http\Response
     */
    public function destroy(AboutUs $aboutUs)
    {
        //
    }
}
