<?php

use App\Category;
use App\Product;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;

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
Auth::routes(['verify' => true]);

Route::get('/', 'HomeController@index')->name('home');
Route::get('/panduan', 'HomeController@panduan')->name('panduan');

Route::get('/categories', 'CategoryController@index')->name('categories');
Route::get('/categories/cari', 'CategoryController@cari')->name('cari');
Route::get('/categories/{id}', 'CategoryController@detail')->name('categories-detail');

Route::get('details/{id}', 'DetailController@index')->name('detail');
Route::post('/details/{id}', 'DetailController@add')->name('detail-add');


Route::get('/register/success', 'Auth\RegisterController@success')->name('register-success');

Route::get('/success', function () {
   return view('pages.success');
});



// Registrasi email
Route::view('verifikasi-email', 'email')->middleware('verified');

Route::group(['middleware' => ['auth']], function(){


    Route::get('/dashboard', 'DashboardController@index')
        ->name('dashboard');

    Route::get('/dashboard/products', 'DashboardProductController@index')
        ->name('dashboard-product');
    Route::get('/dashboard/products/create', 'DashboardProductController@create')
        ->name('dashboard-product-create');
    Route::post('/dashboard/products', 'DashboardProductController@store')
        ->name('dashboard-product-store');
    Route::get('/dashboard/products/{id}', 'DashboardProductController@details')
        ->name('dashboard-product-details');
    Route::post('/dashboard/products/{id}', 'DashboardProductController@update')
        ->name('dashboard-product-update');


    Route::post('/dashboard/products/gallery/upload', 'DashboardProductController@uploadGallery')
        ->name('dashboard-product-gallery-upload');
    Route::get('/dashboard/products/gallery/delete/{id}', 'DashboardProductController@deleteGallery')
        ->name('dashboard-product-gallery-delete');



    Route::get('/dashboard/settings', 'DashboardSettingController@store')
        ->name('dashboard-settings-store');
    Route::get('/dashboard/account', 'DashboardSettingController@account')
        ->name('dashboard-settings-account');
    Route::post('/dashboard/account/{redirect}', 'DashboardSettingController@update')
        ->name('dashboard-settings-redirect');
    Route::post('/dashboard/settings/{redirect}', 'DashboardSettingController@update_store')
        ->name('dashboard-settings-store-redirect');

// Ganti Password
    Route::get('password', 'PasswordController@edit')
        ->name('user.password.edit');

    Route::patch('password', 'PasswordController@update')
        ->name('user.password.update');


});

Route::prefix('member')
    ->namespace('Member')
    ->middleware(['auth','member'])
    ->group(function() {
        Route::get('/', 'DashboardController@index')->name('member-dashboard');
        Route::resource('profile', 'DashboardSettingController');
        Route::resource('supports', 'DashboardSuportController');
        Route::resource('video', 'DashboardSendController');
        Route::resource('videos', 'DashboardVideoController');
        Route::post('/account/{redirect}', 'DashboardSettingController@update')
        ->name('dashboard-settings-redirect');
         Route::get('/dashboard/settings', 'DashboardSettingController@index')
        ->name('dashboard-settings-store');
         Route::get('alquran', 'IslamicController@index')
        ->name('alquran');
         Route::get('doa', 'IslamicController@doa')
        ->name('doa');
        Route::get('alquran/sura/{id}', 'IslamicController@sura')
        ->name('detail-alquran');
        Route::get('tahlil', 'IslamicController@tahlil')
       ->name('tahlil');
        Route::get('wirid', 'IslamicController@wirid')
       ->name('wirid');
        Route::get('solat', 'IslamicController@solat')
       ->name('solat');
        //    khutbah route
        Route::get('khutbah', 'IslamicController@khutbah')->name('khutbah');
        Route::get('/detail-khutbah/{id}', 'IslamicController@detail')->name('detail-khutbah');
        // route hadroh
        Route::get('tutorial-hadroh/{id}', 'HadrohController@tutorial')->name('hadroh.tutor');
        Route::get('buy-hadroh', 'HadrohController@sell')->name('sell');
        Route::get('about', 'DashboardController@about')->name('about');


    });

Route::prefix('admin')
    ->namespace('Admin')
    ->middleware(['auth','admin'])
    ->group(function() {
        Route::get('/', 'DashboardController@index')->name('admin-dashboard');
        Route::resource('category', 'CategoryController');
        Route::resource('banner', 'BannerController');
        Route::resource('suport', 'SuportController');
        Route::resource('user', 'UserController');
        Route::get('export_excel', 'UserController@export_excel');
        Route::resource('product', 'ProductController');
        Route::resource('product-gallery', 'ProductGalleryController');
        Route::resource('sosial','SosialController');
        Route::resource('khutbahcategory','KhutbahcategoryController');
        Route::resource('khutbah','KhutbahController');
    });

    Route::get('genrate-sitemap', function(){

    // create new sitemap object
    $sitemap = App::make("sitemap");

    // add items to the sitemap (url, date, priority, freq)
    $sitemap->add(URL::to('/'), '2012-08-25T20:10:00+02:00', '1.0', 'daily');
    $sitemap->add(URL::to('details'), '2012-08-26T12:30:00+02:00', '0.9', 'monthly');

    // get all posts from db
    // $posts = DB::table('products')->orderBy('created_at', 'desc')->get();

    $categories = Product::all();

    // add every post to the sitemap
    foreach ($categories as $category)
    {
        $sitemap->add(URL::to('details/'.$category->slug.''), $category->updated_at, '1.0', 'daily');
    }

    // generate your sitemap (format, filename)
    $sitemap->store('xml', 'sitemap');
    // this will generate file mysitemap.xml to your public folder

    return redirect(url('sitemap.xml'));

});

// Auth::routes();

