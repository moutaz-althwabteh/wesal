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
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ],
    function()
    {
        /** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/
        Route::get('/', function () {
            return view('welcome');
        });
        Route::get('/admin',function (){
            return view('admin/welcome');
        });
//        Route::get('album/data','AlbumsControllers@anyData');

        Route::get('admin/album/ajaxDelete','AlbumsControllers@deleteajax');
        Route::get('admin/album/ajaxEdit','AlbumsControllers@editAjax');
        Route::get('admin/album/index2','AlbumsControllers@index2');
        Route::get('admin/album/index3','AlbumsControllers@index3');

        Route::post('store','AlbumsControllers@store');
        Route::resource('admin/album','AlbumsControllers');
        Route::get('admin/album/{album}/delete','AlbumsControllers@delete');



        Route::get('admin/image2/data2','ImagesController@anyData');
        Route::resource('admin/image', 'ImagesController');
        Route::post('upload', ['as' => 'upload-post', 'uses' =>'ImagesController@postUpload']);
        Route::get('image/upload-post','AlbumsControllers@uploadpost');
        Route::post('image/upload/delete','ImagesController@deleteUpload');
        Route::get('image/{Image}/delete','ImagesController@getDelete');

        Route::get('register/data','RegsterUserController@anyData');
        Route::resource('register','RegsterUserController');
        Route::get('register/{User}/delete','RegsterUserController@delete');

        Route::get('/login','LoginController@login');
        Route::post('/login','LoginController@postLogin');
        Route::get('/logout','LoginController@postLogout');

        Route::get('/forget_password','ForgetPassworedController@forgetPassword');
        Route::post('/forget_password','ForgetPassworedController@postForgetPassword');
        Route::get('/reset/{email}/{restCode}','ForgetPassworedController@restPassword');
        Route::post('/reset/{email}/{restCode}','ForgetPassworedController@postRestPassword');

        Route::get('user/SendMail','RegsterUserController@SendMail');
        Route::post('user/SendMail','RegsterUserController@postSendMail');

        Route::get('admin/setting','SettingController@index');
        Route::post('admin/setting/update','SettingController@update');
        Route::get('admin/news/data','NewsController@anydata');
        Route::get('admin/myNews/{new}/delete','NewsController@destroy');
        Route::resource('admin/myNews','NewsController');

        Route::get('admin/staticPage/data','StaticPageController@anydata');
        Route::get('admin/staticPage/{staticPage}/delete','StaticPageController@destroy');
        Route::resource('admin/staticPage','StaticPageController');

        Route::get('admin/code/data','CodeController@anydata');
        Route::get('admin/code/{id}/delete','CodeController@destroy');
        Route::resource('admin/code','CodeController');

// socializ
        Route::get('auth/{provider}', 'AuthSocController@redirectToProvider');
        Route::get('auth/{provider}/callback', 'AuthSocController@handleProviderCallback');

//Notifiction
// db
        Route::get('admin/notifyDB', 'NotificationController@NotificationDB');
        Route::get('admin/notifyDB/store', 'NotificationController@CreateNotificationDB');
        Route::get('admin/notifyDB/storeAjax', 'NotificationController@CreateNotificationDBAjax');
        Route::get('admin/notifyDB/readAjax', 'NotificationController@readAjax');
        Route::get('admin/notifyDB/deleteAjax', 'NotificationController@deleteAjax');
// emil
        Route::get('admin/notifyEmil', 'NotificationController@notifyEmil');
        Route::get('admin/sendEmailAjax', 'NotificationController@sendEmailAjax');

//sms
        Route::get('admin/notifySms', 'NotificationController@notifySms');
        Route::get('admin/sendSmsAjax', 'NotificationController@sendSmsAjax');

    });







