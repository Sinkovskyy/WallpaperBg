<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;






Route::get('/', [HomeController::class, 'load']);

Route::get('/page', function () {
    return view('page');
});


