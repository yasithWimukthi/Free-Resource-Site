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

//Route::get('/admin', function () {
//    return view('admin');
//});

Route::get('/', Resource::class);

Route::get('/home', function () {
    return view('home');
});

//Route::get('/resource', function () {
//    return view('resource-new');
//});

//
Route::get('/resource', [App\Http\Controllers\ResourceController::class, 'index'])->name('resource.index');


Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index');

// Route::get('/admin',['middleware' => 'admin', function (){}],[App\Http\Controllers\AdminController::class, 'index']);

Route::get('/awarding-body', [App\Http\Controllers\AwardingBodyController::class, 'index'])->name('awardingbody.index');
Route::get('/exam', [App\Http\Controllers\ExamController::class, 'index'])->name('exam.index');


Route::get('/course', [App\Http\Controllers\CourseController::class, 'index'])->name('course.index');
Route::get('/document', [App\Http\Controllers\DocumentController::class, 'index'])->name('document.index');
Route::post('/admin/document/update/{id}', [App\Http\Controllers\DocumentController::class, 'edit'])->name('document.edit');
Route::get('/admin/document/delete/{id}', [App\Http\Controllers\DocumentController::class, 'remove'])->name('document.remove');
Route::get('/admin/document/restore/{id}', [App\Http\Controllers\DocumentController::class, 'restore'])->name('document.restore');
Route::get('/admin/document/restoreAll', [App\Http\Controllers\DocumentController::class, 'restoreAll'])->name('document.restoreAll');


Route::post('/admin/exam', [App\Http\Controllers\ExamController::class, 'store'])->name('exam.store');
Route::post('/admin/exam/update/{id}', [App\Http\Controllers\ExamController::class, 'edit'])->name('exam.edit');
Route::get('/admin/exam/delete/{id}', [App\Http\Controllers\ExamController::class, 'remove'])->name('exam.remove');
Route::get('/admin/exam/restore/{id}', [App\Http\Controllers\ExamController::class, 'restore'])->name('exam.restore');
Route::get('/admin/exam/restoreAll', [App\Http\Controllers\ExamController::class, 'restoreAll'])->name('exam.restoreAll');


Route::post('/admin/document', [App\Http\Controllers\DocumentController::class, 'store'])->name('document.store');

Route::post('/admin/awarding-body', [App\Http\Controllers\AwardingBodyController::class, 'store'])->name('awardingbody.store');
Route::post('/admin/awarding-body/update/{id}', [App\Http\Controllers\AwardingBodyController::class, 'edit'])->name('awardingbody.edit');
Route::get('/admin/awarding-body/delete/{id}', [App\Http\Controllers\AwardingBodyController::class, 'remove'])->name('awardingbody.remove');
Route::get('/admin/awarding-body/restore/{id}', [App\Http\Controllers\AwardingBodyController::class, 'restore'])->name('awardingbody.restore');
Route::get('/admin/awarding-body/restoreAll', [App\Http\Controllers\AwardingBodyController::class, 'restoreAll'])->name('awardingbody.restoreAll');

Route::post('/admin/course', [App\Http\Controllers\CourseController::class, 'store'])->name('course.store');
Route::post('/admin/course/update/{id}', [App\Http\Controllers\CourseController::class, 'edit'])->name('course.edit');
Route::get('/admin/course/delete/{id}', [App\Http\Controllers\CourseController::class, 'remove'])->name('course.remove');
Route::get('/admin/course/restore/{id}', [App\Http\Controllers\CourseController::class, 'restore'])->name('course.restore');
Route::get('/admin/course/restoreAll', [App\Http\Controllers\CourseController::class, 'restoreAll'])->name('course.restoreAll');

Route::get('/getCourses', [App\Http\Controllers\CourseController::class, 'getCoursesByAwardingId']);
Route::get('/getCoursesById', [App\Http\Controllers\CourseController::class, 'getCoursesById']);
Route::get('/getExams', [App\Http\Controllers\ExamController::class, 'getExamByAwardingId']);
Route::get('/getDocuments', [App\Http\Controllers\DocumentController::class, 'getDocumentByAwardingId']);
