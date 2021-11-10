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

Route::get('/awarding-body', function () {
    return view('awardingbody');
});

Route::get('/course', function () {
    return view('course');
});

Route::get('/exam', function () {
    return view('exam');
});

Route::get('/document', function () {
    return view('document');
});
