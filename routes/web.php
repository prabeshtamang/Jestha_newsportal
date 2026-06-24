<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\Frontend\PageController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [PageController::class,"home"])->name('home');
Route::get('/contact', [PageController::class,"contact"])->name('contact');
Route::get('/khalti/redirect', [PageController::class,"redirect"])->name('khalti.redirect');
Route::post('/contact/store', [PageController::class,"contact_store"])->name('contact.store');     //post is required to save
Route::get('/category/{slug}', [PageController::class,"category"])->name('category');
Route::get('/search', [PageController::class,"search"])->name('search');
Route::get('/article/{slug}', [PageController::class,"article"])->name('article');


