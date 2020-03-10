<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/dashboard', 'HomeController@index')->name('dashboard');

Auth::routes();

Route::post('/login-as-guest', function (Request $request) {
  auth()->attempt(['email' => 'guest', 'password' => env('GUEST_PASSWORD')]);

  return response(user()->createToken($request->ip() . " - " . $request->header('User-Agent'), ['guest'])->plainTextToken);
})->name('login-as-guest');

Route::get('/user', function () {
  return response()->json([
    "request" => request()->user(),
    "auth" => auth()->user()
  ]);
});

Route::get('/{uri}', 'WildcardController@index')->name('wildcard')->where('wildcard', '.*');
