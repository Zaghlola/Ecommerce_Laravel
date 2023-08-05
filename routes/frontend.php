<?php

use App\Http\Controllers\User\indexController;
use Illuminate\Support\Facades\Route;

Route::name('users.')->group(function () {
 //   Route::middleware('guest:web')->group(function () {
       Route::get('/',indexController::class)->name('dashboard');
 

 
 //   });
});