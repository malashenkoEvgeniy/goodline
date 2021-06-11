<?php

namespace App\Http\Controllers\Admin;

use App\Models\TrustUs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;


class TrustUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = TrustUs::all();
        $images = $images->sortBy('sort');
        return view('admin.trust_us.index',compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.trust_us.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        foreach (request()->file('image') as $image) {
            $fileNewName = time() . $image->getClientOriginalName();
            $image->move(public_path() . '/uploads/trust_us', $fileNewName);

            $imageData = [
                'image'=> '/uploads/trust_us/' . $fileNewName
            ];

            $slide = TrustUs::create($imageData);
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TrustUs  $trustUs
     * @return \Illuminate\Http\Response
     */
    public function show(TrustUs $trustUs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TrustUs  $trustUs
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $image = TrustUs::find($id);
        return view('admin.trust_us.edit',compact('image'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TrustUs  $trustUs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $image = TrustUs::find($id);
        $requestData = request()->all();
        if(request()->hasFile('image')){
            if ($image->image !== null && file_exists(public_path($image->image))) {
                unlink(public_path($image->image));
            }

            $requestImage = request()->file('image');
            $fileNewName = time() . $requestImage->getClientOriginalName();
            $requestImage->move(public_path() . '/uploads/trust_us', $fileNewName);
            $requestData['image'] = '/uploads/trust_us/'. $fileNewName;
        }

        $image->update($requestData);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TrustUs  $trustUs
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = TrustUs::find($id);
        if ($image->image !== null && file_exists(public_path($image->image))) {
            unlink(public_path($image->image));
        }
        $image->delete();
        return redirect()->back();
    }
}
