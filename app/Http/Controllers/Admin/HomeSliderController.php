<?php

namespace App\Http\Controllers\Admin;

use App\Models\HomeSlider;
use App\Models\HomeSliderTranslate;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class HomeSliderController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $sliders = HomeSlider::all();
        return view('admin.home_sliders.index',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.home_sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $imageExtension = ['jpg','jpeg','webp','png'];
        $slideRequestData = request()->only('file_path','is_image');

        $originalFile = request()->file('file_path');
        $originalFileNewName = time() . $originalFile->getClientOriginalName();
        $originalFile->move(public_path() . '/uploads/home_slides', $originalFileNewName);
        $slideRequestData['file_path'] = '/uploads/home_slides/' . $originalFileNewName;

        if (in_array($originalFile->getClientOriginalExtension(),$imageExtension)) {
            $slideRequestData['is_image'] = true;
        }else{
            $slideRequestData['is_image'] = false;
        }

        $slide = HomeSlider::create($slideRequestData);

        $slideTranslate = $slide->sliderTranslates()->create(request()->except('file_path','is_image','_token'));

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HomeSlider  $homeSlider
     * @return \Illuminate\Http\Response
     */
    public function show(HomeSlider $homeSlider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HomeSlider  $homeSlider
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slide = HomeSlider::find($id);
        return view('admin.home_sliders.edit',compact('slide'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HomeSlider  $homeSlider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $requestData = request()->all();
        $language = App::getLocale();

        $slide = HomeSlider::find($id);

        $slideTranslate = $slide->translate($requestData['language']); // ищем запись по нашему языку




        if ($slideTranslate != null && $slideTranslate->language == $language) { // текущий язык сайта совпадает с языком записи (перевод есть) -> обновляем
            $slideRequestData = request()->only('file_path','is_image');

            if (isset($requestData['file_path']) ) { // загрузили картинку
                $imageExtension = ['jpg','jpeg','webp','png'];


                $originalFile = request()->file('file_path');

                $originalFileNewName = time() . $originalFile->getClientOriginalName();
                $originalFile->move(public_path() . '/uploads/home_slides', $originalFileNewName);
                $slideRequestData['file_path'] = '/uploads/home_slides/' . $originalFileNewName;

                if (in_array($originalFile->getClientOriginalExtension(),$imageExtension)) {
                    $slideRequestData['is_image'] = true;
                }else{
                    $slideRequestData['is_image'] = false;
                }
            }

            $slide = $slide->update($slideRequestData);

            $slideTranslate = $slideTranslate->update(request()->except('file_path','is_image','_token','_method','language'));

        }else{ // создаём новый перевод
            $slide->sliderTranslates()->create(request()->except('file_path','is_image','_token'));
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HomeSlider  $homeSlider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $slide = HomeSlider::find($id);
        $slide->delete();
        return redirect()->back();
    }
}
