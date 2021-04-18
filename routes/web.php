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

Route::group([], function ($route) {
    $route->get('/login', 'LoginController@index')->name('login.index');
    $route->post('/login', 'LoginController@authenticate')->name('login.authenticate');
});

Route::middleware(['middleware' => 'auth'])->group(function ($route) {

    $route->get('/admin', 'AdminController@index')->name('admin.index');

    $route->get('/admin/branch', 'BranchController@index')->name('branch.index');
    $route->get('/admin/branch/create', 'BranchController@create')->name('branch.create');
    $route->get('/admin/branch/edit/{id}', 'BranchController@edit')->name('branch.edit')->where('id', '[0-9]+');
    $route->post('/admin/branch', 'BranchController@store')->name('branch.store');
    $route->post('/admin/branch/delete', 'BranchController@delete')->name('branch.delete');
});
