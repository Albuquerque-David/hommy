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

//
// CRUD Routes
//

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

Route::get('republic','RepublicController@listRepublics');
Route::get('republic/{id}','RepublicController@showRepublic');
Route::post('republic','RepublicController@createRepublic');
Route::put('republic/{id}','RepublicController@updateRepublic');
Route::delete('republic/{id}','RepublicController@deleteRepublic');

Route::get('commentary','CommentaryController@listCommentaries');
Route::get('commentary/{id}','CommentaryController@showCommentary');
Route::post('commentary','CommentaryController@createCommentary');
Route::put('commentary/{id}','CommentaryController@updateCommentary');
Route::delete('commentary/{id}','CommentaryController@deleteCommentary');

Route::get('favourite','FavouritesController@listFavourites');
Route::get('favourite/{id}','FavouritesController@showFavourite');
Route::post('favourite','FavouritesController@createFavourite');
Route::put('favourite/{id}','FavouritesController@updateFavourite');
Route::delete('favourite/{id}','FavouritesController@deleteFavourite');

Route::get('bedroom','BedroomController@listBedrooms');
Route::get('bedroom/{id}','BedroomController@showBedroom');
Route::post('bedroom','BedroomController@createBedroom');
Route::put('bedroom/{id}','BedroomController@updateBedroom');
Route::delete('bedroom/{id}','BedroomController@deleteBedroom');

//
// Relationship Routes
//
Route::get('renter/bedroom/{id}','RenterController@showBedroom');
