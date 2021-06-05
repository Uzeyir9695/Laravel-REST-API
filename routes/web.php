<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Notifications\FirstNoti;
use Illuminate\Support\Facades\Notification;
use App\Http\Controllers\Blog\CommentController;
use App\Http\Controllers\Blog\BlogController;
use App\Jobs\Mailjob;
use Illuminate\Support\Carbon;

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
    return view('welcome');
});

Auth::routes();

// Route::get('home', 'HomeController@index')->name('home');

// redirects to default page if the page for searching  not found
Route::fallback(function () {
    return view('test.sorry');
});