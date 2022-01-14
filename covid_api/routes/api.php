<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// ini import dari controller
use App\Http\Controllers\PatientController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Get All Resource / mendapatkan semua data
Route::get('/patients',[PatientController::class, 'index']);


// Method POST untuk menambahkan data / Add Resource
Route::post('/patients', [PatientController::class, 'store']);


// Method GET Detail Resource / mendapatkan data berdasarkan id nya
Route::get('/patients/{id}', [PatientController::class, 'show']);


// Method PUT untuk update data
Route::put('/patients/{id}', [PatientController::class, 'update']);


// Method Delete / untuk menghapus data
Route::delete('/patients/{id}', [PatientController::class, 'destroy']);



