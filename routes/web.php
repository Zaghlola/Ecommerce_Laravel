<?php

use App\Http\Controllers\ProfileController;
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



Route::get('test', [RegisteredUserController::class, 'store']);
require __DIR__.'/frontend.php';
require __DIR__.'/users.auth.php';
require __DIR__.'/sellers.auth.php';
require __DIR__.'/seller.php';
Route::get('test', function () {
    foreach(config('auth.guards') as $guard){
        
    }
});