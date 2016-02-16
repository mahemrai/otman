<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

/**
 * Authentication routes
 */
Route::get('login', 'Auth\AuthController@getLogin');
Route::post('login', 'Auth\AuthController@postLogin');
Route::get('logout', 'Auth\AuthController@getLogout');
Route::get('register', 'Auth\AuthController@getRegister');
Route::post('register', 'Auth\AuthController@postRegister');

/**
 * Main application routes
 */
Route::get('dashboard', 'App\AppController@dashboard');
Route::get('users', 'App\AppController@users');

/**
 * Profile routes
 */
Route::get('profile', 'Entity\ProfileController@newProfile');
Route::post('profile', 'Entity\ProfileController@create');
Route::get('profile/{id}/edit', 'Entity\ProfileController@editProfile');
Route::patch('profile/{id}/edit', 'Entity\ProfileController@update');
Route::get('my-profile/{id}', 'Entity\ProfileController@show');
Route::get('profile-pic', 'Entity\ProfileController@profileImage');
Route::post('profile-pic', 'Entity\ProfileController@uploadImage');

/**
 * User routes
 */
Route::get('users/{id}', 'Entity\UserController@userPage');
Route::get('my-email/{id}/edit', 'Entity\UserController@changeEmailForm');
Route::patch('my-email/{id}/edit', 'Entity\UserController@updateEmail');
Route::get('my-password/{id}/edit', 'Entity\UserController@changePasswordForm');
Route::patch('my-password/{id}/edit', 'Entity\UserController@updatePassword');

/**
 * Overtime routes
 */
Route::get('user/{userId}/overtime', 'Entity\OvertimeController@newOvertime');
Route::post('user/{userId}/overtime', 'Entity\OvertimeController@create');

/**
 * API routes
 */
Route::get('api/user/{userId}/overtimes', 'Api\OvertimeController@get');
Route::get('api/overtime/{overtimeId}', 'Api\OvertimeController@get');
Route::patch('api/overtime/{id}', 'Api\OvertimeController@logTime');

/**
 * Admin routes
 */
Route::patch('user/{id}/role/edit', 'App\UserController@updateRole');
Route::patch('profile/{id}/manager/edit', 'App\ProfileController@updateManagerStatus');
