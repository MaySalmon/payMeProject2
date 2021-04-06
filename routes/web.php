<?php

use Illuminate\Support\Facades\Route;
use App\http\controllers\SaleController;
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

Route::get('/table', function () {
    return view('table');
});

Route::get('/salecreation', function () {
    return view('salecreation');
});


Route::get('table', [SaleController::class,'show']);

Route::get('fetch', [SaleController::class,'fetch']);

Route::post('creation', [SaleController::class, 'fetch']);

Route::view('creation', "/salecreation");

Route::get('click_delete/{product_name}',[SaleController::class, 'delete_function']);