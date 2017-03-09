<?php

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

Route::get('/', 'Results@display_result');

Route::get('/admin/upload_results', 'Results@get_upload_form');
Route::post('/upload', 'Results@store_result');
Route::get('/search', 'Results@display_result');
Route::post('/search', 'Results@find_result');