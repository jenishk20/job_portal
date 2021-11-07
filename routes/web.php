<?php


use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


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
Route::get('/admin', [\App\Http\Controllers\AdminController::class, 'index']);
Route::get('/admin/addCompany', [\App\Http\Controllers\AdminController::class, 'addCompany']);

Route::post('/admin/addCompany/confirm', [\App\Http\Controllers\AdminController::class, 'confirmCompany']);
Route::get('/admin/review', [\App\Http\Controllers\AdminController::class, 'review']);
Route::post('/admin/review/confirm', [\App\Http\Controllers\AdminController::class, 'confirm']);
Route::get('/admin/applicants', [\App\Http\Controllers\AdminController::class, 'application']);
Route::post('/admin/applicants/fetch', [\App\Http\Controllers\AdminController::class, 'applicants']);
Route::post('/admin/applicants/update', [\App\Http\Controllers\AdminController::class, 'dd']);


//Change Password
Route::get('/changepass', [\App\Http\Controllers\HomeController::class, 'changePassForm']);
Route::post('/changepass', [\App\Http\Controllers\HomeController::class, 'changePassword']);


//Contact Form


Route::get(
    '/contact',
    function () {
        return view('contact');
    }
);
Route::post(
    '/contact',
    function (Request $request) {
        Mail::send(new ContactMail($request));
        return view('contact')->with('message', 'We have received your response, Thank You for your feedback.');
    }
);


//Student Routes

Route::get('/student/oncampus', [\App\Http\Controllers\StudentController::class, 'show']);
Route::get('/student/profile', [\App\Http\Controllers\StudentController::class, 'show1']);
Route::post('/student/profile/confirm', [\App\Http\Controllers\StudentController::class, 'index']);
Route::get('/student/oncampus/{id}', [\App\Http\Controllers\StudentController::class, 'preview']);

Route::post('/student/oncampus/apply/{id}', [\App\Http\Controllers\StudentController::class, 'apply']);




