<?php

namespace App\Http\Controllers\Admin;


use App\Models\WorkExample;
use App\Models\WorkExampleImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;

class WorkExampleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page = WorkExample::find(1);
        $images = $page->workExampleImages()->get();
        $images = $images->sortBy('sort');

        return view('admin.work_example.index',compact('images','page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.work_example.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $page = WorkExample::find(1);
        $pageRequestData = $request;
        foreach (request()->file('image') as $image) {
            $fileNewName = time() . $image->getClientOriginalName();
            $image->move(public_path() . '/uploads/work_example', $fileNewName);

            $imageData = [
                'image'=> '/uploads/work_example/' . $fileNewName
            ];

            $page->workExampleImages()->create($imageData);
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WorkExample  $workExample
     * @return \Illuminate\Http\Response
     */
    public function show(WorkExample $workExample)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WorkExample  $workExample
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $image = WorkExampleImage::find($id);
        return view('admin.work_example.edit',compact('image'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WorkExample  $workExample
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $image = WorkExampleImage::find($id);
        $requestData = request()->all();
        if(request()->hasFile('image')){
            if ($image->image !== null && file_exists(public_path($image->image))) {
                unlink(public_path($image->image));
            }

            $requestImage = request()->file('image');
            $fileNewName = time() . $requestImage->getClientOriginalName();
            $requestImage->move(public_path() . '/uploads/work_example', $fileNewName);
            $requestData['image'] = '/uploads/work_example/'. $fileNewName;
        }

        $image->update($requestData);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WorkExample  $workExample
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = WorkExampleImage::find($id);
        if ($image->image !== null && file_exists(public_path($image->image))) {
            unlink(public_path($image->image));
        }
        $image->delete();
        return redirect()->back();
    }

    public function updatePage(Request $request)
    {
        $page = WorkExample::find(1);
        $language = App::getLocale();
        $pageTranslate = $page->translate($request['language']); // ищем запись по нашему языку
        $requestData = request()->all();
        if ($pageTranslate != null && $pageTranslate->language == $language) { // текущий язык сайта совпадает с языком записи (перевод есть) -> обновляем
            $pageTranslate->update($requestData);
        }else{ // создаём новый перевод
            $page->workExampleTranslate()->create($requestData);
        }

        return redirect()->back();
    }


}


    // public function updateTranslatedModel($model, $modelTranslate, $modelRequest, $modelTranslateRequest){
    //     $language = App::getLocale();

    //     if ($modelTranslate != null && $modelTranslate->language == $language) { // текущий язык сайта совпадает с языком записи (перевод есть) -> обновляем
    //         $modelTranslate->update($modelTranslateRequest);
    //     }else{ // создаём новый перевод
    //         $model->updateTranslate()->create($modelTranslateRequest);
    //     }

    //     $model->update($modelRequest);
    // }
