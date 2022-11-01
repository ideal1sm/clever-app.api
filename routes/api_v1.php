<?php

use App\Http\Controllers\AuthController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::prefix("sanctum")->group(function () {
    Route::post("register", [AuthController::class, "register"]);
    Route::post("token", [AuthController::class, "token"]);
});

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/user/{id}', function (Request $request) {
        return response()->json(['user' => User::whereId($request->id)->first()]);
    });
});

