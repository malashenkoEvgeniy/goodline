<?php

namespace App\Http\Controllers\Admin;

use App\Models\Certificates;
use App\Services\BaseService;
use App\Services\CategoryService;
use App\Services\CertificateService;
use Illuminate\Http\Request;

class CertificateController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }
    protected $storePath = '/uploads/category/';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $certificates = Certificates::orderby('id', 'desc')->paginate(5);
        return view('admin.certificates.index',compact('certificates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.certificates.create');
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
            'image.mimes' => 'Поле "Иконка для меню" должны обязательно иметь расширения: jpeg,jpg,png,gif',
        ]);
//        $certificate = new Certificates();
        $certificate = Certificates::create(['image'=>'']);

        if (request()->file('image') !== null) {
            BaseService::create_media($certificate, request()->file('image'), CertificateService::STORE_PATH, CertificateService::PARAMETERS);
        }
        $reqT = request()->except('image' );

       $certificate->translations()->create($reqT);

        return redirect()->route('certificates.index')->with('success', 'Запись успешно создана');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $certificate = Certificates::where('id', $id)->first();

        return view('admin.certificates.edit',compact('certificate'));
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
        $this->validate($request, [
            'image' => 'nullable|mimes:jpeg,jpg,png,gif',
        ], [
            'image.mimes' => 'Поле "Иконка для меню" должны обязательно иметь расширения: jpeg,jpg,png,gif',
        ]);
        $reqTranslation = request()->except('image', 'icon', 'parent_id');
        $certificate = Certificates::find($id);
        if (request()->file('image') !== null) {
            BaseService::create_media($certificate, request()->file('image'), CategoryService::STORE_PATH, CertificateService::PARAMETERS);
        }

        $this->updateTranslation($certificate, $reqTranslation, $request);

        return redirect()->route('certificates.index')->with('success', 'Изменения сохранены');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $certificate = Certificates::find($id);
        BaseService::delete_media($certificate);
        $certificate->media()->delete();
        $certificate->delete();

        return redirect()->route('certificates.index')->with('success', 'Запись успешно удалена');
    }
}
