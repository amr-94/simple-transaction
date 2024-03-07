<?php

use App\Http\Controllers\TransactionController;
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
    return view('welcome');
});

route::resource('/transactions',TransactionController::class);
route::get('/transactions/zero/{id}', [TransactionController::class,'makezero'])->name('make.zero');
route::put('/transactions/to/{id}', [TransactionController::class, 'balanceto'])->name('balance.to');


