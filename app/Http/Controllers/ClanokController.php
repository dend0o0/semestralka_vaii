<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Clanok;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ClanokController extends Controller
{
    public function index() {
        $clanky = Clanok::with('user')->latest()->simplePaginate(5);
        $kategorie = Category::all();
        return view('list', [

            'rastliny' => $clanky,
            'kategoria' => $kategorie
        ]);
    }

    public function indexHomepage() {
        $rastliny = Clanok::latest()->take(6)->get();
        return view('welcome', ['rastliny' => $rastliny]);
    }

    public function create() {
        $kategoria = Category::all();
        return view('clanky.create', ['kategorie' => $kategoria]);
    }
    public function store() {
        if (request()->hasFile('image')) {
            $obrazok = request()->file('image')->store('img', 'public');
        }
        request()->validate([
            'nazovClanku' => ['required', 'min:3', 'max:255'],
            'obsahClanku' => ['required', 'min:3', 'max:2000'],
            'kategoria' => ['required', 'string', 'max:255'],
            'image' => ['required', 'image'],
            'minTeplota' => ['required', 'numeric', 'min:-50', 'max:30' ],
            'maxTeplota' => ['required', 'numeric', 'min:0', 'max:60' ],
            'nazovLat' => ['required', 'min:3', 'max:255']
        ]);


        Clanok::create([
            'nazov' => request('nazovClanku'),
            'obsah' => request('obsahClanku'),
            'category_id' => request('kategoria'),
            'user_id' => 1,
            'lat_nazov' => request('nazovLat'),
            'min_teplota' => request('minTeplota'),
            'max_teplota' => request('maxTeplota'),
            'kvitnuca' => request('kvitnuca') == 1 ? 1 : 0,
            'obrazok' => $obrazok
        ]);
        return redirect('/');
    }
    public function show(Clanok $clanok) {
        return view('clanky.clanok', ['rastlina' => $clanok]);
    }
    public function edit(Clanok $clanok) {
        $kategoria = Category::all();
        return view('clanky.edit', ['rastlina' => $clanok,  'kategorie' => $kategoria]);
    }
    public function update(Clanok $clanok) {
        request()->validate([
            'nazovClanku' => ['required', 'min:3', 'max:255'],
            'nazovLat' => ['required', 'min:3', 'max:255'],
            'obsahClanku' => ['required', 'min:3', 'max:2000'],
            'kategoria' => ['required', 'max:255'],
            'minTeplota' => ['required', 'numeric', 'min:-50', 'max:30' ],
            'maxTeplota' => ['required', 'numeric', 'min:0', 'max:60' ]
        ]);

        $clanok->nazov = request('nazovClanku');
        $clanok->obsah = request('obsahClanku');
        $clanok->category_id = request('kategoria');
        $clanok->lat_nazov = request('nazovLat');
        $clanok->min_teplota = request('minTeplota');
        $clanok->max_teplota = request('maxTeplota');
        $clanok->kvitnuca = request('kvitnuca') == 1 ? 1 : 0;
        $clanok->save();

        return redirect('/clanok/' . $clanok->id);
    }
    public function destroy(Clanok $clanok) {
        Storage::disk('public')->delete($clanok->obrazok);
        $clanok->delete();
        return redirect('/list');
    }

}
