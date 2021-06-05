<?php

use App\Http\Controllers\api\WalletController;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/* Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
}); */

Route::group(['prefix' => 'auth'], function () {
    Route::post('login', 'api\AuthController@login');
    Route::post('register', 'api\AuthController@register');
  
    Route::group(['middleware' => 'auth:api'], function() {
        Route::get('logout', 'api\AuthController@logout');
        Route::get('user', 'api\AuthController@user');
    });
});

Route::middleware('auth:api')->group(function () {
    Route::resource('wallet', api\WalletController::class);
    Route::post('exchange', 'api\ExchangeController@exchange');
});