<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserContronller;
use App\Http\Controllers\SinhVienController;

// GET POST => Method HTTP
// a url 
// Get gửi sẽ đẩy lên url
// Post gửi đi sẽ bị ẩn

//Slug
// http://127.0.0.1:8000/ => Base url

Route::get('/', function () {
    echo 'Trang chủ';
});

Route::get('/test', function () {
    echo '123';
});

Route::get('/list-user', [UserContronller::class, 'showUser']);

// Slug
// http://127.0.0.1:8000/get-user/1
Route::get('/get-user/{id}/{name?}', [UserContronller::class, 'getUser']);

// Params 
// http://127.0.0.1:8000/update-user?id=1&name=vu
Route::get('/update-user', [UserContronller::class, 'updateUser']);

Route::get('/thong-tin-sinh-vien',[SinhVienController::class, 'thongtinSV']);




















// /*
// |--------------------------------------------------------------------------
// | Web Routes
// |--------------------------------------------------------------------------
// |
// | Here is where you can register web routes for your application. These
// | routes are loaded by the RouteServiceProvider and all of them will
// | be assigned to the "web" middleware group. Make something great!
// |
// */

// Route::get('/', function () {
//     return view('welcome');
// });
