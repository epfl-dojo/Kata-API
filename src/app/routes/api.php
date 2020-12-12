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

Route::put('/beer/{id}', function (Request $request) {
    BeerController::putBeer($request);
});

Route::patch('/beer/{id}', function (Request $request, $id) {
    // $tmpBeer = Beer::has('comments', '>=', 3)->get();
    Log::info(var_export($request->input('name')));

    $date = new DateTime();
    $formatedDate = $date->format('Y-m-d H:i:s');
    $data = $request->json()->all();
    $data['last_mod'] = $formatedDate;
    $validator = Validator::make($data, [
        'name' => ['string'],
        'brewery_id' => ['integer'],
        'cat_id' => ['integer'],
        'style_id' => ['integer'],
        'abv' => ['float'],
        'ibu' => ['float'],
        'srm' => ['float'],
        'upc' => ['integer'],
        'filepath' => ['string'],
        'descript' => ['string'],
        'add_user' => ['integer'],
    ]);

    if($validator->fails()){
        Log::error('fail');
        return 400;
    } else {
        Log::info('success');
        $beer = Beer::find($id);
        $beer->fill($data);
        $beer->save();
        return 204;
    }

});


Route::get('/breweries', function () {
    return Breweries::all();
});

Route::get('/breweries/{id}', function ($id) {
    return Breweries::find($id);
});


Route::get('/categories', function () {
    return Categories::all();
});

Route::get('/categories/{id}', function ($id) {
    return Categories::find($id);
});


Route::get('/styles', function () {
    return Styles::all();
});

Route::get('/styles/{id}', function ($id) {
    return Styles::find($id);
});
