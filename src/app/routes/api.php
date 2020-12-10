<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Beer;
use App\Models\Breweries;
use App\Models\Categories;
use App\Models\Styles;
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
    // If the Content-Type and Accept headers are set to 'application/json',
    // this will return a JSON structure. This will be cleaned up later.
    return Beer::all();
});

Route::post('/beer', function(Request $request) {
    // $json = $request->json();
    Log::error(var_export($request->json()->all(), true));
    Log::error(var_export($request->getContent(), true));
    Log::error(var_export($request->input('name'), true));
    $param = $request->getContent();

    // Log::debug($param->name);


    $validator = Validator::make($request->json()->all(), [
        'name' => ['required'],
        'descript' => 'required',
    ]);
    // $validator = Validator::make($request->json()->all(), [
    //     'name' => ['required', 'integer'],
    //     'descript' => 'required',
    // ]);


    $date = new DateTime();
    $formatedDate = $date->format('Y-m-d H:i:s');
    // Log::debug($date->format('Y-m-d H:i:s'));



      if($validator->fails()){
          Log::error('fail');
          return 400;
      } else {
          Log::info('success');
          Beer::create(['name' => $request->input('name'), 'brewery_id' => $request->input('brewery_id'), 'cat_id' => $request->input('cat_id'), 'style_id' => $request->input('style_id'), 'abv' => $request->input('abv'), 'ibu' => $request->input('ibu'), 'srm' => $request->input('srm'), 'upc' => $request->input('upc'), 'filepath' => $request->input('filepath'), 'descript' => $request->input('descript'), 'add_user' => $request->input('add_user'), 'last_mod' => $formatedDate]);
          return 204;
      }

    // die();

    // If the Content-Type and Accept headers are set to 'application/json',
    // this will return a JSON structure. This will be cleaned up later.

    // return '--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------';
});

Route::get('/beer/{id}', function ($id) {
    return Beer::find($id);
});

Route::delete('/beer/{id}', function ($id) {
    Beer::destroy($id);
});

Route::put('/beer/{id}', function (Request $request, $id) {
    // $tmpBeer = Beer::has('comments', '>=', 3)->get();

    $validator = Validator::make($request->json()->all(), [
        'name' => ['required'],
        'brewery_id' => ['required', 'integer'],
        'cat_id' => ['required', 'integer'],
        'style_id' => ['required', 'integer'],
        'abv' => ['required', 'float'],
        'ibu' => ['required', 'float'],
        'srm' => ['required', 'float'],
        'upc' => ['required', 'integer'],
        'filepath' => 'required',
        'descript' => 'required',
        'add_user' => ['required', 'integer'],
        'last_mod' => ['required', 'integer'],
    ]);

    if($validator->fails()){
        Log::error('fail');
        return 400;
    } else {
        Log::info('success');
        $Beer = Beer::find($id);
        $Beer->name = $request->input('name');
        $Beer->save();
        return 204;
    }

    // Beer::where('id', $id)
    //       ->update(['name' => 'toto'])
});
Route::patch('/beer/{id}', function (Request $request, $id) {
    // $tmpBeer = Beer::has('comments', '>=', 3)->get();
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
