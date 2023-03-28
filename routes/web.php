<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Listing;
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
// All Listing
Route::get('/', [ListingController::class,'index']);

// showing create form
Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth');

// Getting Listing data from Form and and Saving to database
Route::post('/listings', [ListingController::class, 'store']);

// show edit form
Route::get('/listings/{listing}/edit',
[ListingController::class, 'edit'])->middleware('auth');


// update edited listing in the database
Route::put('/listings/{listing}',
[ListingController::class,'update'])->middleware('auth');



// Delete listing in the database
Route::delete('/listings/{listing}',
[ListingController::class,'destroy'])->middleware('auth');

// show register create form

Route::get('/register', [UserController::class, 'create'])->middleware('guest');

// creating new user
Route::post('/users',[UserController::class,'store']);

// logout
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');


// manage listings
Route::get('listings/manage',[ListingController::class,'manage'])->middleware('auth');

// single listing
Route::get('/listings/{listing}', [ListingController::class, 'show']);





// show login form
Route::get('/login',[UserController::class,'login'])->name('login')->middleware('guest');


// handle login

Route::post('users/authenticate',[UserController::class,'authenticate']);
// Route::get('/hello', function () {
//     return response("<h1>Hello World</h1>")
//     ->header("Content-Type","text/html")
//     ->header("foo","bar");
// });

// Route::get('/posts/{id}',function($id){
//     return response('post ' . $id);
// })->where('id','[0-9]+');

// Route::get('/search',function(Request $request){
//     return response($request->name . " " . $request->city);
// });
