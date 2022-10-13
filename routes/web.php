<?php

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
    return redirect()->route('listDrop');
});

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Drops
Route::get('/drops', [App\Http\Controllers\DropController::class, 'index'])->name('listDrop');
Route::get('/drop/add', [App\Http\Controllers\DropController::class, 'addView'])->name('addDrop');
Route::post('/drop/add', [App\Http\Controllers\DropController::class, 'store'])->name('storeDrop');
Route::post('/drop/delete/{drop}', [App\Http\Controllers\DropController::class, 'delete'])->name('deleteDrop');
Route::get('/drop/edit/{drop}', [App\Http\Controllers\DropController::class, 'edit'])->name('editDrop');
Route::post('/drop/edit/{drop}', [App\Http\Controllers\DropController::class, 'update'])->name('updateDrop');

Route::get('/schedule', [App\Http\Controllers\ScheduleController::class, 'index'])->name('schedule');
Route::post('/get-hours', [App\Http\Controllers\ScheduleController::class, 'getHours']);
Route::post('/generate-pdf', [App\Http\Controllers\ScheduleController::class, 'generatePDF']);