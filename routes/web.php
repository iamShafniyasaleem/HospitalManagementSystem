<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\firstcontroller;
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
Route::get('/first', 'App\Http\Controllers\firstcontroller@first' ); 
Route::get('test', function()
{
    return view ('components.first');
});

Route::get('/', function () {
    return view('welcome');
});
