<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BeerController;
use App\Http\Controllers\StyleController;
use App\Http\Controllers\BreweryController;
use App\Http\Controllers\CategoryController;

use \Illuminate\Support\Facades\Validator;
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





Route::get('/beers', function() {
    return BeerController::getBeers();
});

Route::post('/beer', function(Request $request) {
    BeerController::createBeer($request);
});

Route::get('/beer/{id}', function ($id) {
    return BeerController::getBeer($id);
});

Route::delete('/beer/{id}', function ($id) {
    BeerController::deleteBeer($id);
});

Route::put('/beer/{id}', function (Request $request, $id) {
    BeerController::putBeer($request, $id);
});

Route::patch('/beer/{id}', function (Request $request, $id) {
    BeerController::patchBeer($request, $id);
});

Route::get('/breweries', function () {
    return BreweryController::getBreweries();
});

Route::get('/brewery/{id}', function ($id) {
    return BreweryController::getBrewerie($id);
});

Route::get('/categories', function () {
    return CategoryController::getCategories();
});

Route::get('/category/{id}', function ($id) {
    return CategoryController::getCategory($id);
});

Route::get('/styles', function () {
    return StyleController::getStyles();
});

Route::get('/style/{id}', function ($id) {
    return StyleController::getStyle($id);
});
