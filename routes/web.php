<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use \Illuminate\Routing\Router;

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

Auth::routes();

Route::get('/', 'IndexController')->name('index');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/user', 'UserController@index')->name('user');

Route::group([
    'as' => 'blog.',
    'namespace' => 'Blog',
    'prefix' => '/blog',
], function (Router $route) {
    $route->get('/', 'Post@index')->name('index');

    $route->get('/create', 'Post@create')->name('create');
    $route->post('/create', 'Post@store')->name('store');

    $route->get('/view/{id}', 'Post@show')->name('show');

    $route->get('/update/{id}', 'Post@edit')->name('edit');
    $route->put('/update/{id}', 'Post@update')->name('update');

    $route->delete('/destroy/{id}', 'Post@destroy')->name('destroy');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
