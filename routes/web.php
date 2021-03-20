<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ImagesSenderController;




Route::get('/', [HomeController::class, 'load']);
Route::get('/{tag}',[HomeController::class, 'loadByTag']);
Route::get('/page/{id}',[PageController::class, 'load']);

Route::post('/getImages',[ImagesSenderController::class,'getImages']);



