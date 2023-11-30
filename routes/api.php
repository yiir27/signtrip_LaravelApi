<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TripController;

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

Route::post('/login', LoginController::class)->name('login');
Route::post('/register', [RegisteredUserController::class, 'store']);
Route::middleware(['auth:sanctum'])->group(function () {
    //全投稿ページ
    Route::get('/home',[TripController::class,'index']);
    //個別投稿ページ
    Route::get('/home/{trip_id}',[TripController::class, 'show']);
    //ログアウト
    Route::post('/logout', LogoutController::class)->name('logout');
    //新規投稿
    Route::post('/users/home/newPost',[TripController::class,'create']);
    Route::get('/categories',[CategoryController::class,'index']);
    //投稿下書き保存
    Route::post('/users/home/new',[TripController::class,'store']);
    
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::get('test', function () {
        return response()->json(['message' => 'This is a protected route!']);
    });
});