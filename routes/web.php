<?php

use App\Http\Controllers\ClanokController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\GalleryImageController;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use App\Models\Clanok;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use \App\Http\Controllers\RegistrationController;
use App\Http\Controllers\LoginController;


Route::get('/', [ClanokController::class, 'indexHomepage']);


Route::get('/login', [LoginController::class, 'create']);
Route::post('/login', [LoginController::class, 'store']);

Route::get('/clanok/novy', [ClanokController::class, 'create']);

Route::get('/clanok/{clanok}', [ClanokController::class, 'show']);

Route::get('/clanok/{clanok}/upravit', [ClanokController::class, 'edit']);

Route::post('/clanky', [ClanokController::class, 'store']);

Route::patch('/clanok/{clanok}', [ClanokController::class, 'update']);

Route::delete('/clanok/{clanok}', [ClanokController::class, 'destroy']);

Route::get('/register', [RegistrationController::class, 'create']);

Route::post('/register', [RegistrationController::class, 'store']);

Route::get('/list', [ClanokController::class, 'index']);

Route::get('/list/{category}', [ClanokController::class, 'filter']);

Route::post('/logout', [LoginController::class, 'destroy']);

Route::post('/clanok/{clanok}/comment', [CommentController::class, 'store']);

Route::delete('/clanok/{clanok}/comment/{comment}', [CommentController::class, 'destroy']);

Route::get('/clanok/{clanok}/upload', [GalleryImageController::class, 'show']);

Route::post('/clanok/{clanok}/upload', [GalleryImageController::class, 'store']);

Route::delete('/clanok/{clanok}/upload/{img}', [GalleryImageController::class, 'destroy']);

Route::get('/clanok/{clanok}/{img}/upravit', [GalleryImageController::class, 'edit']);

Route::patch('/clanok/{clanok}/{img}', [GalleryImageController::class, 'update']);




