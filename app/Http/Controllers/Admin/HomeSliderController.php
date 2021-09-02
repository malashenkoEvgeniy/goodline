<?php

namespace App\Http\Controllers\Admin;

use App\Models\HomeSlider;
use App\Models\HomeSliderTranslate;
use App\Http\Controllers\Controller;
use App\Models\MediaProject;
use App\Services\HomeSliderService;
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
        $originalFile = request()->file('file_path');

        if ($originalFile !== null) {
            $slide = HomeSliderService::create_media($originalFile);
        } else {
            $slide = new HomeSlider();
        }

         $slide->sliderTranslates()->create(request()->except('file_path','is_image','_token'));

        return redirect()->route('homeSliders.index')->with('success', 'Запись успешно создана');
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

        $slide = HomeSlider::find($id);

        $originalFile = request()->file('file_path');

        if ($originalFile !== null) {
            HomeSliderService::delete_media($slide);
            HomeSliderService::create_media($originalFile);
        }
//        $language = App::getLocale();
        $slide->translate()->update(request()->except('file_path','is_image','_token','_method','language'));


        return redirect()->route('homeSliders.index')->with('success', 'Запись успешно создана');
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
        if($slide->is_image){
            HomeSliderService::delete_media($slide);
            $slide->media->delete();
        } else {
            if ($slide->file_path !== null){
                if (file_exists(public_path($slide->file_path))) {
                    unlink(public_path($slide->file_path));
                }
            }
        }
        $slide->delete();
        return redirect()->route('homeSliders.index')->with('success', 'Запись успешно создана');
    }
}
