<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RevisorController;

Route::get('/', [PublicController::class, 'welcome'])->name('welcome');

// ROTTA ANNUNCI
Route::get("/insert_ad",[AdController::class,'insertAd'])->name("insert_ad");
Route::get("/ad_index",[AdController::class,'adIndex'])->name("ad_index");
Route::get("/ad_show/{ad}",[AdController::class,'adShow'])->name("ad_show");
Route::get("/ad/{category}", [AdController::class,'adCategory'])->name("ad_category");

// ROTTA REVISORE
Route::get('/revisor/index_rev', [RevisorController::class, 'indexRev'])->name('revisor.index');
Route::patch('/accept/{ad}', [RevisorController::class, 'accept'])->name('accept');
Route::patch('/reject/{ad}', [RevisorController::class, 'reject'])->name('reject');

