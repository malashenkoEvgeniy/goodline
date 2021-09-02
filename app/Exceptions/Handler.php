<?php

namespace App\Exceptions;

use App\Models\Category;
use App\Models\Certificates;
use App\Models\Page;
use App\Models\Settings;
use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        if ($this->isHttpException($exception)) {
            $settings = Settings::find(1);
            $categories = Category::where('parent_id', null)->with('children')->get();
            $pages = Page::where('parent_id', null)->with('getKids')->orderby('order_by')->get();
            $interesting = Page::where('parent_id', 1)->get();
            $certificates = Certificates::get();
            $seo = (object) [
                'title' => 'Error!',
                'description' => "Страница отсутствует",
                'keywords' => 'Error!'
            ];
            /** @var HttpExceptionInterface $exception */
            if ($exception->getStatusCode() == 404) {

                return response()->view('errors.404', compact('seo','settings', 'categories', 'pages', 'interesting', 'certificates'), 404);
            }

            if ($exception->getStatusCode() == 500) {
                return response()->view('errors.404', compact('settings', 'seo', 'categories', 'pages', 'interesting', 'certificates'), 500);
            }

        }

        return parent::render($request, $exception);
    }
}
