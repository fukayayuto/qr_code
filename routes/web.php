<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\Ajax;
use Illuminate\Support\Facades\Mail;

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

// Route::get('/', function () {
//     return view('welcome');
// });

//初期画面(入力フォーム)
Route::get('/', [AccountController::class, 'index'])->name('qr_form');

//確認画面表示
Route::get('/check', [AccountController::class, 'check_list_index']);
Route::post('/check', [AccountController::class, 'check_list'])->name('check_list');

//登録、メール自動送信
Route::post('/store', [AccountController::class, 'store'])->name('store');
Route::get('/store', [AccountController::class, 'store_index']);


//QRコード
Route::get('/qrcode', function () {
    return view('/qrcode/qrcode');
});

//メール送信後
Route::get('/sent', function () {
    return view('/qrcode/sent');
});
