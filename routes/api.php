<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

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

Route::get('/api', function () {
  return ['a' => 'some'];
});

// Route::get('/api', function () {
//   $response = Http::get('https://client.myemailverifier.com/clientarea/emailverifier/index.php/verifier/validate_single', [
//     'email' => 'john.smith@email.co',
//     'apikey' => env('MYEMAILVERIFY_APIKEY', '123')
//   ])->json();

//   return $response;
//   Log::info('response: ', $response);
// });

