<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\AboutUsItems;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class AboutUsItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.about_us.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $RequestData = request()->only('file_path','is_image','link');


        if(isset($RequestData['file_path'])){
            $imageExtension = ['jpg','jpeg','webp','png'];
            $originalFile = request()->file('file_path');
            $originalFileNewName = time() . $originalFile->getClientOriginalName();
            $originalFile->move(public_path() . '/uploads/about_us', $originalFileNewName);
            $RequestData['file_path'] = '/uploads/about_us/' . $originalFileNewName;
        }else{
            $RequestData['is_image'] = false;
        }

        $item = AboutUsItems::create($RequestData);


        $itemTranslate = $item->aboutUsItemsTranslate()->create(request()->except('file_path','is_image','_token','link'));



        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AboutUsItems  $aboutUsItems
     * @return \Illuminate\Http\Response
     */
    public function show(AboutUsItems $aboutUsItems)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AboutUsItems  $aboutUsItems
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $aboutUsItem = AboutUsItems::find($id);
        return view('admin.about_us.edit',compact('aboutUsItem'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AboutUsItems  $aboutUsItems
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $requestData = request()->all();
        $language = App::getLocale();

        $item = AboutUsItems::find($id);

        $itemTranslate = $item->translate($requestData['language']); // ищем запись по нашему языку

        if ($itemTranslate != null && $itemTranslate->language == $language) { // текущий язык сайта совпадает с языком записи (перевод есть) -> обновляем

            $itemRequestData = request()->only('file_path','is_image','link');

            if (isset($requestData['file_path']) ) { // загрузили картинку
                $imageExtension = ['jpg','jpeg','webp','png'];
                $originalFile = request()->file('file_path');

                $originalFileNewName = time() . $originalFile->getClientOriginalName();
                $originalFile->move(public_path() . '/uploads/about_us', $originalFileNewName);
                $itemRequestData['file_path'] = '/uploads/about_us/' . $originalFileNewName;

                if (in_array($originalFile->getClientOriginalExtension(),$imageExtension)) {
                    $itemRequestData['is_image'] = true;
                }else{
                    $itemRequestData['is_image'] = false;
                }

                $itemRequestData['link'] = null;
            }

            if (isset($requestData['link']) && $requestData['link'] != $item->link){
                if($item->file_path !== null){
                    unlink(public_path($item->file_path));
                }
                $itemRequestData['is_image'] = false;
                $itemRequestData['file_path'] = null;
            }

            $item = $item->update($itemRequestData);

            $itemTranslate = $itemTranslate->update(request()->except('file_path','is_image','_token','_method','language','link'));

        }else{ // создаём новый перевод
            $item->aboutUsItemsTranslate()->create(request()->except('file_path','is_image','_token','link'));
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AboutUsItems  $aboutUsItems
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = AboutUsItems::find($id);
        if($item->file_path !== null){
            unlink(public_path($item->file_path));
        }
        $item->delete();
        return redirect()->back();
    }
}
