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

Route::get('/', 'Controller@front')->name('front');

// Projects
Route::get('/projects/{id}', 'ProjectController@view')->name('project');

// Contact
Route::get('/contact', 'ContactController@index')->name('contact');
Route::post('/contact', 'ContactController@post')->name('contact.post');

