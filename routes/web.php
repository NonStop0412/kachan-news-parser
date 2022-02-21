<?php

use Illuminate\Support\Facades\Route;
use App\Parsing;
use App\Models\Article;
use Illuminate\Support\Facades\Auth;

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

//News
Route::group(['namespace' => 'App\Http\Controllers'], function() {
    Route::get('/', 'HomeController@index')->name('/');
    Route::get('/load', 'HomeController@loadNews')->name('load.news');
});

Route::get('/tsn', function () {
    $source = new Parsing('https://www.pravda.com.ua/rss/view_news/');
    $feed = [];
    $feed[] = $source->getFeed();
    return view('tsn', ['feeds' => $feed]);
});

// Admin
Route::group(['middleware' => 'auth', 'namespace' => 'App\Http\Controllers'], function(){
    // Main page
    Route::get('/admin', 'AdminController@index')->name('admin.index');
    // Profile page
    Route::get('/admin/profile/{id}', 'AdminController@profile')->name('profile');
    // Sources
    Route::get('/admin/sources', 'SourceController@sources')->name('admin.sources');
    Route::delete('/admin/sources/delete/{id}', 'SourceController@deleteSource')->name('delete.source');
    Route::get('/admin/sources/form/add', 'SourceController@addFormSource')->name('add.source.form');
    Route::post('/admin/sources/add', 'SourceController@addSource')->name('add.source');
    Route::get('/admin/sources/edit/{id}', 'SourceController@editFormSource')->name('edit.source.form');
    Route::post('/admin/sources/edit', 'SourceController@editSource')->name('edit.source');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
