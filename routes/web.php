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
Route::get('/revisor/index_rev', [RevisorController::class, 'indexRev'])->middleware('isRevisor')->name('revisor.index');
Route::patch('/accept/{ad}', [RevisorController::class, 'accept'])->name('accept');
Route::patch('/reject/{ad}', [RevisorController::class, 'reject'])->name('reject');
Route::middleware(['auth', 'isRevisor'])->group(function () {
// Route::get('/revisor/undo', [RevisorController::class, 'undoLastAction'])->name('revisor.undo');
Route::patch('/revisor/undo/{ad}', [RevisorController::class, 'undoAdAction'])->name('revisor.undo');
});

// ROTTA MAIL REVISOR
Route::get("/revisor/request",[RevisorController::class,'becomeRevisor'])->middleware('auth')->name("become.revisor");
Route::get("/make/revisor/{user}",[RevisorController::class,'makeRevisor'])->name("make.revisor");
// ROTTA RICERCA ANNUNCI
Route::get('/search/ad', [AdController::class, 'searchAds'])->name('ad_search');
//ROTTA LINGUA
Route::post('/lingua/{lang}', [PublicController::class, 'setLanguage'])->name('setLocale');

//ROTTA PARAMETRICA WHISHLIST
Route::get("/my-ads", [AdController::class, 'myAds'])->name('my.ads');

