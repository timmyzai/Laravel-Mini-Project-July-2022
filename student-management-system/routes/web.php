<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ExamController;

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

Route::get('/', [StudentController::class, 'index'])->name('index');

Route::resource('student', StudentController::class);
Route::resource('course', CourseController::class);
Route::resource('exam', ExamController::class);
Route::resource('report', ReportController::class);
Route::get('/exportScoreByCourse', [ReportController::class, 'exportScoreByCourse']);
Route::get('/exportScoreByStudent', [ReportController::class, 'exportScoreByStudent']); 