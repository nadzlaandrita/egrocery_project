<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
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
    return view('index');
});

Route::get('/checkout', [OrderController::class, 'loadSuccessPage']);
Route::delete('/checkout', [OrderController::class, 'toSuccess']);

Route::get('/account-maintenance', function () {
    return view('admin.acc_maintenance');
});


    Route::get('/register', [AuthController::class, 'registerPage']);
    Route::post('/register', [AuthController::class, 'register']);
    
    Route::get('/login', [AuthController::class, 'loginPage']);
    Route::post('/login', [AuthController::class, 'login']);

    Route::get('/profile', [UserController::class, 'loadProfilePage']);
    Route::patch('/update-profile', [UserController::class, 'updateProfile']);
    Route::get('/saved', [UserController::class, 'toSaved']);


    Route::get('/logout', [AuthController::class, 'logout']);

    Route::get('/home', [ItemController::class, 'loadItemPage']);
    Route::get('/detail-item/{id}', [ItemController::class, 'loadDetailItem']);
    Route::get('/cart', [OrderController::class, 'loadCart']);
    Route::post('/add-cart/{id}', [OrderController::class, 'addCart']);
    Route::delete('/remove-cart/{product_id}', [OrderController::class, 'removeCart']);

    Route::get('/account-maintenance', [UserController::class, 'loadAccountPage']);
    Route::delete('/delete-account/{id}', [UserController::class, 'deleteAccount']);
    
    Route::get('/update-role/{id}', [UserController::class, 'loadUpdateRolePage']);


