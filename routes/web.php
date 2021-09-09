<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|

*/


Auth::routes();

Route::get('/clear', function () {
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    Log::debug('CLEARED');
});
Route::get('sitemap.xml','SitemapController@index');

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){

    Route::group(['prefix' => 'admin'], function(){

        Route::get('/admin-panel', 'HomeController@index')->name('home');

        Route::resource('homeSliders','Admin\HomeSliderController');

        Route::resource('aboutUs','Admin\AboutUsController');
        Route::resource('aboutUsItems','Admin\AboutUsItemsController');

        Route::resource('categories','Admin\CategoryController');

        Route::resource('products','Admin\ProductController');
        Route::post('/delete-product-slide', 'Admin\ProductController@destroySlide')->name('destroySlide');
        Route::post('/store-product-color', 'Admin\ProductController@storeColor')->name('storeColor');
        Route::post('/delete-product-color', 'Admin\ProductController@destroyColor')->name('destroyColor');

        Route::resource('workExamples','Admin\WorkExampleController');
        Route::post('/update-work-example-translate', 'Admin\WorkExampleController@updatePage')->name('updateWorkExampleTranslate');

        Route::resource('pages','Admin\PageController');
        Route::resource('settings','Admin\SettingsController');

        Route::resource('certificates','Admin\CertificateController');
        Route::resource('characteristics','Admin\CharacteristicsController');

        Route::resource('message','Admin\FeedbackController');

        Route::resource('files','Admin\FilesController');





    });
});


Route::get('/register', function (){
    return redirect('/');
});


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localizationRedirect', 'localeViewPath' ]
    ], function(){


        Route::get('/', 'Frontend\PageController@index'); // Главная

//        Route::get('/catalog', 'Frontend\PageController@aboutUs'); // Каталог

        Route::get('/contacts', 'Frontend\PageController@contacts'); // Примеры работ

        Route::get('/{url}','Frontend\PageController@page'); // Текстовые страницы / каталог / товар / Каталог

        Route::post('/sendForms','Frontend\Forms\BasicFormController@sendForm')->name('sendForm');

        Route::post('/sendFormsProducst','Frontend\Forms\BasicFormController@sendFormProducts')->name('sendFormProducts');




});


