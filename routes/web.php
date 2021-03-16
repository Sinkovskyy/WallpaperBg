<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagsController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    $tags = DB::table('tags')->get();
    $images = DB::table('images')->get();
    return view('home',['tags'=>$tags,'images'=>$images]);
});

Route::get('/page', function () {
    return view('page');
});


// Route::get('/users', [TagsController::class, 'getData']);