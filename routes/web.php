<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdController;
use App\Http\Controllers\PublicController;

Route::get('/', [PublicController::class, 'welcome'])->name('welcome');

Route::get("/insert_ad",[AdController::class,'insertAd'])->name("insert_ad");