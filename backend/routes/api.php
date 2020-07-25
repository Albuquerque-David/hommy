<?php

use Illuminate\Http\Request;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('renter','RenterController@listRenters');
Route::get('renter/{id}','RenterController@showRenter');
Route::post('renter','RenterController@createRenter');
Route::put('renter/{id}','RenterController@updateRenter');
Route::delete('renter/{id}','RenterController@deleteRenter');

Route::get('tenant','TenantController@listTenants');
Route::get('tenant/{id}','TenantController@showTenant');
Route::post('tenant','TenantController@createTenant');
Route::put('tenant/{id}','TenantController@updateTenant');
Route::delete('tenant/{id}','TenantController@deleteTenant');

