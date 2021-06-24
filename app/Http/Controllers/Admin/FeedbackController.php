<?php

namespace App\Http\Controllers\Admin;



use App\Models\Feedback;
use App\Models\Product;
use App\Models\ProductColor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;

class FeedbackController extends BaseController
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
        $feedbacks = Feedback::orderBy('created_at')->get();
        return view('admin.feedback.index',compact('feedbacks'));
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $feedback = Feedback::find($id);
        if($feedback->viewed < 1 ) $feedback->update(['viewed'=>1]);
        $product = Product::find($feedback->product_id);
        return view('admin.feedback.show',compact('feedback','product'));
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        Feedback::destroy($id);

        return redirect()->route('message.index')->with('success', 'Запись успешно удалена');
    }
}
