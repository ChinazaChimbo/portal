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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

//student routes
Route::middleware(['auth:sanctum', 'verified'])->get('student/add', 'AdminController@addStudent');
Route::get('logout', 'PagesController@logout');
Route::post('student/add', 'AdminController@storeStudent');
Route::get('student/show', 'AdminController@showStudents');

//class routes
Route::get('class/add', 'AdminController@showClassAdd');
Route::post('class/add', 'AdminController@storeClass');
Route::get('class/show', 'AdminController@showClass');
Route::post('class/show/edit', 'AdminController@changeclass');
Route::get('class/show/delete/{id}', 'AdminController@deleteclass');