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
    return view('admin');
});

//Route::get('/awarding-body', function () {
//    return view('awardingbody');
//});

Route::get('/awarding-body', [App\Http\Controllers\AwardingBodyController::class, 'index'])->name('awardingbody.index');

//Route::get('/course', function () {
//    return view('course');
//});

Route::get('/course', [App\Http\Controllers\CourseController::class, 'index'])->name('course.index');

Route::get('/exam', function () {
    return view('exam');
});

Route::get('/document', function () {
    return view('document');
});

Route::post('/admin/exam', [App\Http\Controllers\ExamController::class, 'store'])->name('exam.store');

Route::post('/admin/awardingbody', [App\Http\Controllers\AwardingBodyController::class, 'store'])->name('awardingbody.store');

Route::post('/admin/course', [App\Http\Controllers\CourseController::class, 'store'])->name('course.store');
