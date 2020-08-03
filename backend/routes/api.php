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
// Passport Routes
//
Route::post('register', 'API\PassportController@register');
Route::post('login', 'API\PassportController@login');

Route::group(['middleware'=>'auth:api'], function(){
    Route::get('logout', 'API\PassportController@logout');
    Route::get('getDetails', 'API\PassportController@getDetails');
});

//
// Filter Routes
//
Route::get('republic/search','RepublicController@search');
Route::get('republic/lowerToHigher/{list?}','RepublicController@getLowerPriceRepublics');
Route::get('republic/rate/highRating','RepublicController@getRepublicsWithHighRating');
Route::get('republic/deleted','RepublicController@getDeletedRepublics');


//
// CRUD Routes
//

//Renter
Route::get('renter','RenterController@listRenters');
Route::get('renter/{id}','RenterController@showRenter');
Route::post('renter','RenterController@createRenter');
Route::put('renter/{id}','RenterController@updateRenter');
Route::delete('renter/{id}','RenterController@deleteRenter');

//Tenant
Route::get('tenant','TenantController@listTenants');
Route::get('tenant/{id}','TenantController@showTenant');
Route::post('tenant','TenantController@createTenant');
Route::put('tenant/{id}','TenantController@updateTenant');
Route::delete('tenant/{id}','TenantController@deleteTenant');

//Republic
Route::get('republic/{rating?}/{name?}','RepublicController@listRepublics');
Route::get('republic/{id}','RepublicController@showRepublic');
Route::post('republic','RepublicController@createRepublic');
Route::put('republic/{id}','RepublicController@updateRepublic');
Route::delete('republic/{id}','RepublicController@deleteRepublic');


//Comementaries
Route::get('commentary','CommentaryController@listCommentaries');
Route::get('commentary/{id}','CommentaryController@showCommentary');
Route::post('commentary','CommentaryController@createCommentary');
Route::put('commentary/{id}','CommentaryController@updateCommentary');
Route::delete('commentary/{id}','CommentaryController@deleteCommentary');

//Favourites
Route::get('favourite','FavouritesController@listFavourites');
Route::get('favourite/{id}','FavouritesController@showFavourite');
Route::post('favourite','FavouritesController@createFavourite');
Route::put('favourite/{id}','FavouritesController@updateFavourite');
Route::delete('favourite/{id}','FavouritesController@deleteFavourite');

//Bedrooms
Route::get('bedroom','BedroomController@listBedrooms');
Route::get('bedroom/{id}','BedroomController@showBedroom');
Route::post('bedroom','BedroomController@createBedroom');
Route::put('bedroom/{id}','BedroomController@updateBedroom');
Route::delete('bedroom/{id}','BedroomController@deleteBedroom');

//
// Relationship Routes
//

//Renter
Route::get('renter/{id}/bedroom','RenterController@showBedroom');
Route::post('renter/{id}/bedroom','RenterController@rentBedroom');
Route::delete('renter/{id}/bedroom','RenterController@quitRentingBedroom');

Route::get('renter/{id}/favourites','RenterController@showFavourites');

//Republic
Route::get('republic/{id}/tenant','RepublicController@showTenant');
Route::get('republic/{id}/comments','RepublicController@showComments');
Route::get('republic/{id}/renters','RepublicController@showRenters');

