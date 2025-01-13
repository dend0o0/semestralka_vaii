<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Clanok;
use App\Models\GalleryImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class GalleryImageController extends Controller
{
    //
    public function show(Clanok $clanok) {
        if (auth()->guest() || $clanok->user_id !== Auth::id()) {
            return redirect('/');
        }
        return view('gallery.create', ['rastlina' => $clanok]);
    }

    public function store(Clanok $clanok) {
        if (request()->hasFile('image')) {
            $obrazok = request()->file('image')->store('img', 'public');
        }
        request()->validate([
            'nazov' => ['required', 'min:3', 'max:255'],
            'popis' => ['required', 'min:3', 'max:2000'],
            'image' => ['required', 'image'],
        ]);


        GalleryImage::create([
            'name' => request('nazov'),
            'description' => request('popis'),
            'img' => $obrazok,
            'clanok_id' => $clanok->id
        ]);
        return redirect('/clanok/' . $clanok->id);
    }

    public function destroy(Clanok $clanok, GalleryImage $img) {


        Storage::disk('public')->delete($img->img);
        $img->delete();
        //return redirect('/clanok/' . $clanok->id);
        return response()->json(['message' => 'Obrázok bol úspešne odstránený']);
    }

    public function edit(Clanok $clanok, GalleryImage $img) {
        if (auth()->guest() || $clanok->user_id !== Auth::id()) {
            return redirect('/');
        }
        return view('gallery.edit', ['rastlina' => $clanok,  'image' => $img]);
    }

    public function update(Clanok $clanok, GalleryImage $img) {

        request()->validate([
            'nazov' => ['required', 'min:3', 'max:255'],
            'popis' => ['required', 'min:3', 'max:2000']
        ]);

        $img->name = request('nazov');
        $img->description = request('popis');
        $img->save();

        return redirect('/clanok/' . $clanok->id);
    }
}
