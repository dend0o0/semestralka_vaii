<?php

use App\Http\Controllers\ClanokController;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use App\Models\Clanok;
use App\Models\Category;



Route::get('/', [ClanokController::class, 'indexHomepage']);

Route::get('/login', function () {
    return view('login');
});

Route::get('/clanok/novy', [ClanokController::class, 'create']);

Route::get('/clanok/{clanok}', [ClanokController::class, 'show']);

Route::get('/clanok/{clanok}/upravit', [ClanokController::class, 'edit']);

Route::post('/clanky', [ClanokController::class, 'store']);

Route::patch('/clanok/{clanok}', [ClanokController::class, 'update']);

Route::delete('/clanok/{clanok}', [ClanokController::class, 'destroy']);

Route::get('/list', [ClanokController::class, 'index']);


