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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//Admin Routes
Route::get('/admin',[\App\Http\Controllers\AdminController::class,'index']);
Route::get('/admin/addCompany',[\App\Http\Controllers\AdminController::class,'addCompany']);

Route::post('/admin/addCompany/confirm',[\App\Http\Controllers\AdminController::class,'confirmCompany']);
Route::get('/admin/review',[\App\Http\Controllers\AdminController::class,'review']);
Route::post('/admin/review/confirm',[\App\Http\Controllers\AdminController::class,'confirm']);



Route::get('/changepass',[\App\Http\Controllers\HomeController::class,'changePassForm']);
Route::post('/changepass',[\App\Http\Controllers\HomeController::class,'changePassword']);






//Student Routes

Route::get('/student/oncampus',[\App\Http\Controllers\StudentController::class,'show']);
Route::get('/student/profile',[\App\Http\Controllers\StudentController::class,'show1']);
Route::get('/student/oncampus/{id}',[\App\Http\Controllers\StudentController::class,'preview']);
Route::post('/student/profile/confirm',[\App\Http\Controllers\StudentController::class,'index']);
