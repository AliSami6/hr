<?php
use Illuminate\Support\Facades\DB;
use illuminate\Support\Facades\Route;
use App\Http\Controllers\CheckOutController;
use App\Http\Controllers\Setting\AboutController;
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

// front page route

Route::get('/', 'Front\WebController@index')->name('home');
Route::get('job/{id}/{slug?}', 'Front\WebController@jobDetails')->name('job.details');
Route::post('job-application', 'Front\WebController@jobApply')->name('job.application');

// front page route

Route::get('login', 'User\LoginController@index')->name('login');
Route::post('login', 'User\LoginController@Auth');

Route::get('mail', 'User\HomeController@mail');

Route::group(['middleware' => ['preventbackbutton', 'auth']], function () {

    Route::get('dashboard', 'User\HomeController@index');
    Route::get('profile', 'User\HomeController@profile');
    Route::get('logout', 'User\LoginController@logout');
    Route::resource('user', 'User\UserController', ['parameters' => ['user' => 'user_id']]);
    Route::resource('userRole', 'User\RoleController', ['parameters' => ['userRole' => 'role_id']]);
    Route::resource('rolePermission', 'User\RolePermissionController', ['parameters' => ['rolePermission' => 'id']]);
    Route::post('rolePermission/get_all_menu', 'User\RolePermissionController@getAllMenu');
    Route::resource('changePassword', 'User\ChangePasswordController', ['parameters' => ['changePassword' => 'id']]);

});

Route::get('reset-password-user', 'ResetPasswordController@index')->name('reset.password');
Route::post('reset-password-user', 'ResetPasswordController@sendResetLink')->name('reset.password');
Route::get('enter-password', 'ResetPasswordController@enterPassword')->name('reset.password.enter');
Route::post('enter-password', 'ResetPasswordController@store')->name('reset.password.enter');
Route::get('about', 'Front\AboutController@index')->name('about');
Route::get('services', 'Front\ServiceController@serviceList')->name('services');
Route::get('products', 'Front\WebController@productList')->name('products');
Route::get('add-to-cart/{id}','Front\WebController@addToCart')->name('add_to_cart');
Route::get('cart','Front\WebController@cart')->name('cart');
Route::post('/update-cart', 'Front\WebController@update')->name('update_cart');
Route::get('remove-from-cart',  'Front\WebController@remove')->name('remove_from_cart');
Route::get('checkout',  'Front\WebController@checkout')->name('checkout');
Route::post('order', 'Front\WebController@processOrder')->name('order');
Route::get('contact', 'Front\ContactController@index')->name('contact');
Route::get('creer', 'Front\WebController@jobList')->name('creer');

Route::post('/send-mail','Front\WebController@sendMail')->name('mail.msg');
Route::post('/send-news','Front\WebController@newsLetters')->name('mail.news');
Route::get('local/{language}', function ($language) {
    session(['my_locale' => $language]);
    return redirect()->back();
});