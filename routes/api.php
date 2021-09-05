<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\EntrantController;

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

Route::post('promotion/store', [PromotionController::class, 'store']);
Route::post('promotion/{client:slug}', [PromotionController::class, 'show']);
Route::post('promotion/{client:slug}/entrant/{mechanic:slug}', [EntrantController::class, 'store']);
