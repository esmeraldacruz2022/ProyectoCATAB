<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiciosController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

// Route::get('/servicios', function () {
//     return view('servicios.index');
// });

// Route::get('/servicios/create',[ServiciosController::class,'create'] );

Route::resource('servicios', ServiciosController::class)->middleware('auth');

Auth::routes();
// Auth::routes(['register'=>false,'reset'=>false]);

Route::get('/home', [ServiciosController::class, 'index'])->name('home');


Route::group(['middleware'=>'auth'],function(){

    Route::get('/', [ServiciosController::class, 'index'])->name('home');
});
