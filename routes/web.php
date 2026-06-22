<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\Frontend\PageController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [PageController::class,"home"])->name('home');
Route::get('/contact', [ContactController::class,"contact"])->name('contact');
Route::post('/contact/store', [ContactController::class,"contact_store"])->name('contact.store');     //post is required to save
Route::get('/category/{slug}', [PageController::class,"category"])->name('category');
Route::get('/search', [PageController::class,"search"])->name('search');
Route::get('/article/{slug}', [PageController::class,"article"])->name('article');


