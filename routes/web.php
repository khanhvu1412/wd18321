<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\UserContronller;
// use App\Http\Controllers\SinhVienController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\AuthenticationController;

// GET POST => Method HTTP
// a url 
// Get gửi sẽ đẩy lên url
// Post gửi đi sẽ bị ẩn

//Slug
// http://127.0.0.1:8000/ => Base url

// Route::get('/', function () {
//     echo 'Trang chủ';
// });

// Route::get('/test', function () {
//     echo '123';
// });

// Route::get('/list-user', [UserContronller::class, 'showUser']);

// // Slug
// // http://127.0.0.1:8000/get-user/1
// Route::get('/get-user/{id}/{name?}', [UserContronller::class, 'getUser']);

// // Params 
// // http://127.0.0.1:8000/update-user?id=1&name=vu
// Route::get('/update-user', [UserContronller::class, 'updateUser']);

// // Lab1
// Route::get('/thong-tin-sinh-vien', [SinhVienController::class, 'thongtinSV']);



// CRUD
// http://127.0.0.1:8000/users/add-users

// Route::group(['prefix' => 'users', 'as' => 'users.'], function () {
//     Route::get('list-users', [UserContronller::class, 'listUsers'])->name('listUsers');
//     // Route::get('/', [UserContronller::class, 'listUsers'])->name('listUsers');


//     Route::get('add-users', [UserContronller::class, 'addUsers'])->name('addUsers');

//     Route::post('add-users', [UserContronller::class, 'addPostUsers'])->name('addPostUsers');

//     Route::get('delete-users/{idUser}', [UserContronller::class, 'deleteUsers'])->name('deleteUsers');

//     Route::get('update-users/{idUser}', [UserContronller::class, 'updateUsers'])->name('updateUsers');

//     Route::post('update-users', [UserContronller::class, 'updatePostUsers'])->name('updatePostUsers');

// });

// Lap2 CRUD product
// Route::group(['prefix' => 'products', 'as' => 'products.'], function () {
//     Route::get('list-product', [ProductController::class, 'listProducts'])->name('listProducts');

//     Route::get('add-product', [ProductController::class, 'addProducts'])->name('addProducts');

//     Route::post('add-product', [ProductController::class, 'addPostProducts'])->name('addPostProducts');

//     Route::get('delete-product/{idPro}', [ProductController::class, 'deleteProducts'])->name('deleteProducts');

//     Route::get('update-product/{idPro}', [ProductController::class, 'updateProducts'])->name('updateProducts');

//     Route::post('update-product}', [ProductController::class, 'updatePostProducts'])->name('updatePostProducts');

//     // Route::get('search-product}', [ProductController::class, 'searchProducts'])->name('searchProducts');

//     // Route::get('search-get-product}', [ProductController::class, 'searchGetProducts'])->name('searchGetProducts');
// });


// Route::get('test', [UserContronller::class, 'test']);



Route::get('login', [AuthenticationController::class, 'login'])->name('login');
Route::post('login', [AuthenticationController::class, 'postLogin'])->name('postLogin');
Route::get('logout', [AuthenticationController::class, 'logout'])->name('logout');
Route::get('register', [AuthenticationController::class, 'register'])->name('register');
Route::post('post-register', [AuthenticationController::class, 'postRegister'])->name('postRegister');






// Admin

Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'middleware' => 'checkAdmin'
], function () {

    Route::group([
        'prefix' => 'products',
        'as' => 'products.'
    ], function () {
        // list product
        Route::get('/', [ProductController::class, 'listProducts'])->name('listProducts');
        Route::get('add-product', [ProductController::class, 'addProduct'])->name('addProduct');
        Route::post('add-product', [ProductController::class, 'addPostProduct'])->name('addPostProduct');
        Route::delete('delete-product', [ProductController::class, 'deleteProduct'])->name('deleteProduct');
        Route::get('detail-product/{idProduct}', [ProductController::class, 'detailProduct'])->name('detailProduct');
        Route::get('update-product/{idProduct}', [ProductController::class, 'updateProduct'])->name('updateProduct');
        Route::patch('update-product/{idProduct}', [ProductController::class, 'updatePatchProduct'])->name('updatePatchProduct');




    });
});
