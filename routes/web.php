<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\paymentController;
use App\Http\Controllers\permissionController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\TourserviceController;


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


// Route::get('/update/{rolesId}',[RoleController::class,'update']);
// // Route::get('/app',function(){
// //  return view('app');
// // });


Route::resource('posts',CustomerController::class);
Route::resource('books',BookingController::class);
Route::resource('roles',RolesController::class);
Route::resource('coms',CommentController::class);
Route::resource('pays',paymentController::class);
Route::resource('perms',permissionController::class);
Route::resource('tours',TourserviceController::class);
