<?php

use Illuminate\Support\Facades\Route;
use App\Models\Beer;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// ---------------------------
// /controller/action/param
// ---------------------------


Route::get('/', function () {
    return view('homepage');
});


//
// Route::get('/beer/{id}', function () {
//     return view('welcome', ['id' => $beer_id]);
// });
//
// Route::match(['get', 'post'], '/hello/{firstName}', function ($firstName) {
//     return view('helloNicolas', ['firstName' => ucfirst($firstName)]);
// });
//
// Route::get('/', function () {
//     return view('welcome');
// });
//
// // Route::get('/hw', function () {
// //     return view('hw');
// // });
//
// Route::get('/hw', function () {
//     return view('hw');
// });
//
// Route::match(['get', 'post'], '/hello/{firstName}', function ($firstName) {
//     return view('helloNicolas', ['firstName' => ucfirst($firstName)]);
// });
//
//
//
// Route::get('/{page}', 'PageController@view')->name('pages.view');
