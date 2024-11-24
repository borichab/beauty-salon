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
use App\SliderImages;
use App\parlours;

Route::get('/', function () {
    $photos = SliderImages::all();
    $parlours = parlours::where('availability', 'available')->get();
    return view('welcome',compact('photos', 'parlours'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/parlours', 'ParlourController');
Route::get('/admin/dashboard', 'ParlourController@indexParl')->name('dashboard');
Route::resource('/users', 'UserController');
Route::resource('/service', 'ServiceController');

Route::resource('/addSliderImage', 'SliderImage');
Route::get('/parlour/{parlour}', 'ParlourController@parlourIndex')->name('parlour');
Route::get('/users/{user}', 'UserController@userInfo')->name('user');
