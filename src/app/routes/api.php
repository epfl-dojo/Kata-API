<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Beer;
use App\Models\Breweries;
use App\Models\Categories;
use App\Models\Styles;

use App\Http\Controllers\BeerController;
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




/**
* @OA\Post(
*     path="/lalala",
*     description="Home page",
*     @OA\Response(response="default", description="Welcome page")
* )
*/

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
    return BeerController::getBreweries();
});

Route::get('/breweries/{id}', function ($id) {
    return BeerController::getBrewerie($id);
});

Route::get('/categories', function () {
    return BeerController::getCategories();
});

Route::get('/categories/{id}', function ($id) {
    return BeerController::getCategorie($id);
});

Route::get('/styles', function () {
    return BeerController::getStyles();
});

Route::get('/styles/{id}', function ($id) {
    return BeerController::getStyle($id);
});
