<?php

use Illuminate\Http\Request;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');
  
    Route::group([
      'middleware' => 'auth:api'
    ], function() {
        Route::get('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user');
    });
});

Route::group([
    'namespace' => 'API',
    'middleware' => ['api', 'auth:api'],
    'prefix' => 'course',
], function () {
    Route::get('{courseId}', 'CourseController@view');
    Route::post('', 'CourseController@viewList');
    Route::post('me', 'CourseController@myList');
    Route::post('create', 'CourseController@create');
    Route::put('update', 'CourseController@update');
});

Route::group([
    'namespace' => 'API',
    'middleware' => ['api', 'auth:api'],
    'prefix' => 'category',
], function () {
    Route::get('', 'CategoryController@viewList');
});
