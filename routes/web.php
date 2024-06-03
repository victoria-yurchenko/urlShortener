<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UrlController;

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
    return view('welcome');
});

Route::post('/urls', [UrlController::class, 'store']);
Route::get('/{any}/{shortUrl}', [UrlController::class, 'show'])->where(['any' => '.*', 'shortUrl' => '^[A-Za-z0-9]+$']);
