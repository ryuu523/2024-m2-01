<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::middleware(['no-cache','auth'])->group(function (){
    Route::get('/menu',[\App\Http\Controllers\UserController::class,'menu'])->name('menu');

    Route::get('/event',[\App\Http\Controllers\UserController::class,'event'])->name('event');
    Route::get('/event_register',[\App\Http\Controllers\UserController::class,'show_event_register'])->name('show_event_register');
    Route::get('/event_edit',[\App\Http\Controllers\UserController::class,'show_event_edit'])->name('show_event_edit');

    Route::get('/worker',[\App\Http\Controllers\UserController::class,'worker'])->name('worker');
    Route::get('/worker_register',[\App\Http\Controllers\UserController::class,'show_worker_register'])->name('show_worker_register');
    Route::get('/worker_edit',[\App\Http\Controllers\UserController::class,'show_worker_edit'])->name('show_worker_edit');

    Route::get('/dispatche',[\App\Http\Controllers\UserController::class,'dispatche'])->name('dispatche');
    Route::get('/dispatche_register',[\App\Http\Controllers\UserController::class,'show_dispatche_register'])->name('show_dispatche_register');
    Route::get('/dispatche_edit',[\App\Http\Controllers\UserController::class,'show_dispatche_edit'])->name('show_dispatche_edit');


    Route::post('logout',[\App\Http\Controllers\UserController::class,'logout'])->name('user.logout');

    Route::post('/event_register',[\App\Http\Controllers\UserController::class,'event_register'])->name('event_register');
    Route::post('/event_edit',[\App\Http\Controllers\UserController::class,'event_edit'])->name('event_edit');
    Route::post('/event_delete',[\App\Http\Controllers\UserController::class,'event_delete'])->name('event_delete');

    Route::post('/worker_register',[\App\Http\Controllers\UserController::class,'worker_register'])->name('worker_register');
    Route::post('/worker_edit',[\App\Http\Controllers\UserController::class,'worker_edit'])->name('worker_edit');
    Route::post('/worker_delete',[\App\Http\Controllers\UserController::class,'worker_delete'])->name('worker_delete');

    Route::post('/dispatche_register',[\App\Http\Controllers\UserController::class,'dispatche_register'])->name('dispatche_register');
    Route::post('/dispatche_edit',[\App\Http\Controllers\UserController::class,'dispatche_edit'])->name('dispatche_edit');
    Route::post('/dispatche_delete',[\App\Http\Controllers\UserController::class,'dispatche_delete'])->name('dispatche_delete');


    
});

Route::get('/login',[App\Http\Controllers\UserController::class,"showLogin"]);
Route::post('/login',[\App\Http\Controllers\UserController::class,'login']);
