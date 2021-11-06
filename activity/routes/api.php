<?php

use Illuminate\Support\Facades\Route;
use App\Http\Procedures\StatProcedure;

Route::rpc('/stat', [StatProcedure::class]);
