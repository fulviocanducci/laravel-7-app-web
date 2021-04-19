<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::group([], function ($route) {
    $route->get('/login', 'LoginController@index')->name('login.index');
    $route->post('/login', 'LoginController@authenticate')->name('login.authenticate');
});

Route::middleware(['middleware' => 'auth'])->group(function ($route) {
    /*ADMIN */
    $route->get('/admin', 'AdminController@index')->name('admin.index');
    /*LOGOUT*/
    $route->post('/logout', 'LoginController@logout')->name('login.logout');
    /*BRANCH*/
    $route->get('/admin/branch', 'BranchController@index')->name('branch.index');
    $route->get('/admin/branch/create', 'BranchController@create')->name('branch.create');
    $route->get('/admin/branch/edit/{id}', 'BranchController@edit')->name('branch.edit')->where('id', '[0-9]+');
    $route->post('/admin/branch', 'BranchController@store')->name('branch.store');
    $route->post('/admin/branch/delete', 'BranchController@delete')->name('branch.delete');
});
