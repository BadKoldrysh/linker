<?php

use Illuminate\Support\Facades\Route;
use Linker\Link\UI\Http\Controller\RedirectController;

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

Route::get('/redirect/{hash}', [RedirectController::class, 'redirectTo'])
    ->where('hash', '[0-9A-Za-z]{' . config('generator.url_tail_length') . '}')
    ->name(config('generator.redirect_route_name'));
