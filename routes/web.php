<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/tr', function () {
    return view('tr');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/form', function () {
    return view('form_communications');
});

use App\Http\Controllers\PostBitrix24Controller;
Route::post('/postic', [PostBitrix24Controller::class, 'Submit']);

use App\Http\Controllers\MyPageController;
Route::get('/my_page', [MyPageController::class, 'index']);

Route::get('/test', function () {
    return 'test';
});

Route::post('/submit', function (Request $request) {
    return redirect()->back();
});