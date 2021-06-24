<?php

namespace App\Http\Controllers\Admin;

use App\Models\Characteristics;
use Illuminate\Http\Request;

class CharacteristicsController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }
    protected $storePath = '/uploads/characteristics/';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $characteristics = Characteristics::orderby('id', 'desc')->paginate(5);
        return view('admin.characteristics.index',compact('characteristics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.characteristics.create');
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
            'image' => 'nullable|mimes:jpeg,jpg,png,gif',
        ], [
            'image.mimes' => 'Поле "Картинка" должны обязательно иметь расширения: jpeg,jpg,png,gif',
        ]);

        $req = request()->only('image' );

        if (request()->file('image') !== null) {
            $file = $this->storeFile(request()->file('image'), $this->storePath);
            $req['image'] = $file['path'];
        }
        $reqT = request()->except('image' );

        $this->storeWithTranslation(new Characteristics(), $req, $reqT);

        return redirect()->route('characteristics.index')->with('success', 'Запись успешно создана');
    }

    public function edit($id)
    {
        $characteristic = Characteristics::where('id', $id)->first();

        return view('admin.characteristics.edit',compact('characteristic'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'image' => 'nullable|mimes:jpeg,jpg,png,gif',
        ], [
            'image.mimes' => 'Поле "Картинка" должны обязательно иметь расширения: jpeg,jpg,png,gif',
        ]);
        $reqTranslation = request()->except('image');
        $characteristic = Characteristics::find($id);
        if (request()->file('image') !== null) {
            $this->deleteFile($characteristic->image);
            $file = $this->storeFile(request()->file('image'), $this->storePath);
            $characteristic->image = $file['path'];
            $characteristic->update(['image' => $characteristic->image]);
        }

        $this->updateTranslation($characteristic, $reqTranslation, $request);

        return redirect()->route('characteristics.index')->with('success', 'Запись успешно создана');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $characteristic = Characteristics::find($id);
        if($characteristic->image !== null){
            unlink(public_path($characteristic->image));
        }
        $characteristic->delete();

        return redirect()->route('characteristics.index')->with('success', 'Запись успешно удалена');
    }
}
