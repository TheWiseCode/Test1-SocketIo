<?php

use App\Events\PrivateMessage;
use App\Events\PublicMessage;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/chat', function () {
    event(new PublicMessage());
    dd('Public event executed successfully.');
});

Route::get('/private-chat', function () {
    event(new PrivateMessage(auth()->user()));
    dd('Private event executed successfully.');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
