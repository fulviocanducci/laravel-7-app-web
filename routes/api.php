<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('v1/auth/login', 'Api\AuthController@postLogin');

Route::middleware('auth:api')->group(function () {
    //AUTH
    Route::get('v1/auth/user', 'Api\AuthController@getUser');
    Route::post('v1/auth/logout', 'Api\AuthController@postSignout');
    Route::post('v1/auth/refresh', 'Api\AuthController@postRefresh');
    //BRANCH
    Route::get('v1/branch', 'Api\BranchController@getBranchs');
    Route::get('v1/branch/{id}', 'Api\BranchController@getBranch');
    Route::post('v1/branch', 'Api\BranchController@postBranch');
    Route::put('v1/branch/{id}', 'Api\BranchController@putBranch');
    Route::delete('v1/branch/{id}', 'Api\BranchController@delBranch');
});
