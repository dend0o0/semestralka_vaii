<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use App\Models\Clanok;
use App\Models\Category;



Route::get('/', function () {
    $rastliny = Clanok::latest()->take(6)->get();
    return view('welcome', ['rastliny' => $rastliny]);
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/clanok', function () {
    return view('clanok');
});

Route::get('/clanok/novy', function() {
    $kategoria = Category::all();
    return view('clanky.create', ['kategorie' => $kategoria]);
});

Route::get('/clanok/{id_clanok}', function ($id) {
    $rastlina = Clanok::find($id);
    return view('clanky.clanok', ['rastlina' => $rastlina]);
});

Route::get('/clanok/{id_clanok}/upravit', function ($id) {
    $kategoria = Category::all();
    $rastlina = Clanok::find($id);
    return view('clanky.edit', ['rastlina' => $rastlina,  'kategorie' => $kategoria]);
});

Route::post('/clanky', function() {
    request()->validate([
        'nazovClanku' => ['required', 'min:3', 'max:255'],
        'obsahClanku' => ['required', 'min:3', 'max:2000'],
        'kategoria' => ['required', 'string', 'max:255'],
    ]);

    Clanok::create([
        'nazov' => request('nazovClanku'),
        'obsah' => request('obsahClanku'),
        'category_id' => request('kategoria'),
        'user_id' => 1,
        'lat_nazov' => request('nazovLat'),
        'min_teplota' => request('minTeplota'),
        'max_teplota' => request('maxTeplota'),
        'kvitnuca' => 0,
        'obrazok' => 'figovnik-kaucukovy.jpg'
    ]);
    return redirect('/');
});

Route::patch('/clanok/{id_clanok}', function ($id) {
    request()->validate([
        'nazovClanku' => ['required', 'min:3', 'max:255'],
        'obsahClanku' => ['required', 'min:3', 'max:2000'],
        'kategoria' => ['required', 'max:255'],
    ]);

    $rastlina = Clanok::findOrFail($id);
    $rastlina->nazov = request('nazovClanku');
    $rastlina->obsah = request('obsahClanku');
    $rastlina->category_id = request('kategoria');
    $rastlina->lat_nazov = request('nazovLat');
    $rastlina->min_teplota = request('minTeplota');
    $rastlina->max_teplota = request('maxTeplota');
    $rastlina->save();

    return redirect('/clanok/' . $id);
});

Route::delete('/clanok/{id_clanok}', function ($id) {
    $rastlina = Clanok::findOrFail($id);
    $rastlina->delete();
    return redirect('/list');
});

Route::get('/list', function () {
    $clanky = Clanok::with('user')->latest()->simplePaginate(5);
    $kategorie = Category::all();
    return view('list', [

        'rastliny' => $clanky,
        'kategoria' => $kategorie
    ]);
});


