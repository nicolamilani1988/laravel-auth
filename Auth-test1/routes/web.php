<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/','TestController@homepage')
->name('homepage');

Route::get('/pilot/{id}','TestController@pilot')
->name('pilot');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/create/car','TestController@createCar')
->name('createCar');
Route::post('/store/car','TestController@storeCar')
->name('storeCar');

Route::get('/edit/car/{id}','TestController@editCar')
-> name('editCar');