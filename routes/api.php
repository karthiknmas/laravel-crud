<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\http\Controllers\studentController;
use App\http\Controllers\contactController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::resource('student', studentController::class);
Route::get('contact/create', [ContactController::class, 'create']);
Route::post('contact', [ContactController::class, 'store']);
