<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\BookController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::prefix('v1')->group(function() {

    // Login API
    Route::post('login', [AuthController::class, 'login']);

    // Books APIs
    Route::get('books', [BookController::class, 'index']);
    Route::get('books/{book}', [BookController::class, 'show']);

    Route::middleware('auth:sanctum')->group(function() {
        // Add Book
        Route::post('books', [BookController::class, 'store']);
        // Update Book
        Route::put('books/{book}', [BookController::class, 'update']);
        // Delete Book
        Route::delete('books/{book}', [BookController::class, 'destroy']);

        // Admin Logout
        Route::get('logout', [AuthController::class, 'logout']);
    });
});
