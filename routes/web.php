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

/*
 * lesson-11 homework
 * CRUD operations with user
 */

Route::group([
    'as' => 'user.',
    'namespace' => 'User',
    'prefix' => '/user',
], static function (Router $route) {
    $route->get('/', 'User@index')->name('index');
    // Insert user
    $route->get('/create', 'User@create')->name('create');
    $route->post('/create', 'User@store')->name('store');
    // Select user
    $route->get('/show', 'User@select_form')->name('select');
    $route->post('/show', 'User@show_user')->name('show_user');
    $route->get('/show/{user}', 'User@show')->name('show');
    // Update user
    $route->get('/update', 'User@select_user')->name('select_user');
    $route->post('/update', 'User@update_form')->name('update_form');
    $route->get('/update/{id}', 'User@edit')->name('edit');
    $route->put('/update/{id}', 'User@update')->name('update');
    // Delete user
    $route->get('/destroy', 'User@delete_form')->name('delete');
    $route->delete('/destroy', 'User@destroy')->name('destroy');
});
