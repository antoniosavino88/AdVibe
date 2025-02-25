<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdController;
use App\Http\Controllers\PublicController;

Route::get('/', [PublicController::class, 'welcome'])->name('welcome');

// ROTTA ANNUNCI
Route::get("/insert_ad",[AdController::class,'insertAd'])->name("insert_ad");
Route::get("/ad_index",[AdController::class,'adIndex'])->name("ad_index");
Route::get("/ad_show/{ad}",[AdController::class,'adShow'])->name("ad_show");
Route::get("/ad/{category}", [AdController::class,'adCategory'])->name("ad_category");

