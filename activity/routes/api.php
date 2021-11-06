<?php

use App\Http\Controllers\StatController;
use Illuminate\Support\Facades\Route;
use App\Http\Procedures\StatProcedure;

Route::rpc('/stat', [StatProcedure::class]);
Route::get('/stat', [StatController::class, "index"]);
