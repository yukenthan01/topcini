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

// Route::get('/cat', function () {
//     // Artisan::call('migrate');
//     return view('front-end.pages.sigleview.blade');
// });


// ////////

Route::get('post-publish', 'Admin\PostPublishController@postpublish');


Route::get('/config-cache',function(){
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    Artisan::call('queue:restart');
    Artisan::call('cache:clear');

});

Route::get('/file',function(){
    echo 'done';
    Artisan::call('queue:work',['--stop-when-empty' => true]);
    return 'done';


});

// Route::get('/tamildhool','Admin\PostController@countposttamildhool')->name('countpost');

Route::get('/mig', function () {
    Artisan::call('migrate');
    // return 'success';
    // return view('front-end.pages.sigleview.blade');
});

Route::get('/test', function () {


    for ($i=0; $i <count(pageTokens()) ; $i++) {
        // \App\Jobs\SendPost::dispatch(pageTokens()[$i]);

        Toolkito\Larasap\SendTo::Facebook(
            'link',
            [
                'link' =>'http://topcini.info',
                'message' => ' Added at Topcini',
                'page_access_token' => 'EAADR8GOoKx0BAEaR5NZA70iAxtC3E0NVd1m3K5DZCuj8siiaZAZBSAJKyaK958XbwDnPhj2uiZBnOhI1P2pw8XgfC5fmblZAVXasjoX7SqZCp0GZCB3ZBOOWSKEzWwDGzfiLYdzzQvWgSFAG4Q6hKGS9SZAW4iAvFwgB3tlMpMAWxghsCoam2Nn7FK',
                // 'photo' =>public_path('category_image/anjali.jpg'),


            ]
            // 'photo',
            // [
            //     'photo' =>public_path('front-end/category_image/anjali.jpg'),


            // ]
        );


    }

    // \App\Jobs\SendPost::dispatch();
});

// Route::get('config-cache',function(){
//     Artisan::call('config:cache');
//     Artisan::call('view:clear');
//     return 'success';
// });

Route::get('/', 'Front\TopciniController@index')->name('index');

// Auth::routes();


$this->get('aurait', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('aurait', 'Auth\LoginController@login');
$this->post('logout', 'Auth\LoginController@logout')->name('logout');


Route::get('/home', 'HomeController@index')->name('home');

Route::get('dashboard', 'HomeController@dashboard')->name('dashboard');

Route::resource('permission', 'Admin\PermissionController');
Route::resource('role', 'Admin\RoleController');
Route::resource('user', 'Admin\UserController');
Route::name('password.edit')->get('password-change', 'Admin\UserController@passwordReset');
Route::name('password.update')->post('password-change', 'Admin\UserController@postPasswordReset');

Route::group(['prefix'=>'admin','middleware' => ['auth']], function(){
    Route::resource('category', 'Admin\CategoryController');
    Route::resource('post', 'Admin\PostController');
    Route::get('searchresults', 'Front\TopciniController@searchresults')->name('searchresults');
    Route::get('fbcount', 'Front\TopciniController@fbcount')->name('fbcount');
    Route::resource('comments', 'Admin\CommentsController');
    Route::resource('subscribers', 'Admin\SubscriberController');
    Route::get('search', 'Front\TopciniController@backendsearch')->name('search');
    Route::get('urlpost', 'Admin\PostController@sendcurl')->name('urlpost');
    Route::get('youtube', 'Admin\PostController@youtube')->name('youtube');
    // test curl get
    Route::get('sendcurl', 'Admin\PostController@sendcurl')->name('sendcurl');
    Route::post('getcurlpost', 'Admin\PostController@getcurlpost')->name('getcurlpost');
    Route::post('postyoutube', 'Admin\PostController@postyoutube')->name('postyoutube');
});


// Route::get('/page', 'GraphController@publishToPage')->name('fb');

Route::post('child', 'Admin\PostController@child')->name('child');
///////////////////////////////////////////////////////////////

Route::get('/', 'Front\TopciniController@index')->name('index');
Route::post('savecomment', 'Front\TopciniController@savecomment')->name('savecomment');
Route::post('subscribe', 'Front\TopciniController@subscribe')->name('subscribe');

Route::get('/{slug?}', 'Front\TopciniController@categoryview')->name('category');

Route::get('/{category?}/{drama?}', 'Front\TopciniController@singledrama')->name('singledrama');

Route::get('/{category?}/{drama?}/{postdrama?}', 'Front\TopciniController@singleserial')->name('singleserial');

Route::post('autocomplete', 'Front\TopciniController@autocomplete')->name('autocomplete');
Route::post('searchresults', 'Front\TopciniController@searchresults')->name('searchresults');

// Route::get('test-email', 'Admin\JobController@processQueue');






