<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Beer;
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
        'name' => ['required', 'integer'],
        'descript' => 'required',
    ]);


    $date = new DateTime();
    $formatedDate = $date->format('Y-m-d H:i:s');
    // Log::debug($date->format('Y-m-d H:i:s'));



      if($validator->fails()){
          Log::error('fail');
          return 400;
      } else {
          Log::error('success');
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
    Beer::delete($id);
});

// Route::put('/beer/{id}', function ($id) {
//     return Beer::find($id);
// });
// Route::patch('/beer/{id}', function ($id) {
//     return Beer::find($id);
// });
