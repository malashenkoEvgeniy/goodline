<?php

namespace App\Http\Controllers\Admin;

use App\Models\Files;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FilesController extends BaseController
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $files = Files::all();
        return view('admin.files.index',compact('files'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.files.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $RequestData = request()->all();
        foreach(request()->file('file') as $file){
            $originalFileNewName = time() . $file->getClientOriginalName();
            $file->move(public_path() . '/uploads/files', $originalFileNewName);
            $RequestData['file'] = '/uploads/files/' . $originalFileNewName;
            $result = Files::create($RequestData);
        }


        return redirect(route('files.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function edit(Feedback $feedback)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Feedback $feedback)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function destroy(Files $file)
    {
        if (file_exists(public_path($file->file))) {
            unlink(public_path($file->file));
        }

        $file->delete();
        return redirect(route('files.index'));
    }
}
