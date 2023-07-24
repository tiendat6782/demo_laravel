<?php

use App\Http\Controllers\StudentController;
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

Route::match(['GET','POST'],'/login',[App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
Route::match(['GET','POST'],'/logout',[App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'check.role'])->group(function (){
    //tat ca cac route nao muon bao ve thi ut vao trong nay
    Route::get('/student',[App\Http\Controllers\StudentController::class, 'index'])->name('route_student_index');
    Route::post('/student',[App\Http\Controllers\StudentController::class, 'index']);
Route::match(['GET','POST'],'/student/add',[App\Http\Controllers\StudentController::class, 'addStudent'])->name('route_student_add');
Route::match(['GET','POST'],'/student/edit/{id}',[App\Http\Controllers\StudentController::class, 'editStudent'])->name('route_student_edit');
Route::match(['GET','POST'],'/student/delete/{id}',[App\Http\Controllers\StudentController::class, 'deleteStudent'])->name('route_student_delete');
});



