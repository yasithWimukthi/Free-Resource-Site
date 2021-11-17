<?php

use App\Http\Livewire\Resource;
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

Route::get('/admin', function () {
    return view('admin');
});

Route::get('/', Resource::class);

//Route::get('/awarding-body', function () {
//    return view('awardingbody');
//});

Route::get('/awarding-body', [App\Http\Controllers\AwardingBodyController::class, 'index'])->name('awardingbody.index');

//Route::get('/course', function () {
//    return view('course');
//});

Route::get('/course', [App\Http\Controllers\CourseController::class, 'index'])->name('course.index');
Route::get('/document', [App\Http\Controllers\DocumentController::class, 'index'])->name('document.index');

Route::get('/exam', function () {
    return view('exam');
});

//Route::get('/document', function () {
//    return view('document');
//});

Route::post('/admin/exam', [App\Http\Controllers\ExamController::class, 'store'])->name('exam.store');
Route::post('/admin/document', [App\Http\Controllers\DocumentController::class, 'store'])->name('document.store');

Route::post('/admin/awarding-body', [App\Http\Controllers\AwardingBodyController::class, 'store'])->name('awardingbody.store');
Route::post('/admin/awarding-body/update/{id}', [App\Http\Controllers\AwardingBodyController::class, 'edit'])->name('awardingbody.edit');
Route::get('/admin/awarding-body/delete/{id}', [App\Http\Controllers\AwardingBodyController::class, 'remove'])->name('awardingbody.remove');

Route::post('/admin/course', [App\Http\Controllers\CourseController::class, 'store'])->name('course.store');

//Route::get('getCourses/{id}', 'CategoryController@get_causes_against_category');

Route::get('getCourses/{id}', [App\Http\Controllers\CourseController::class, 'getCoursesByAwardingId']);
