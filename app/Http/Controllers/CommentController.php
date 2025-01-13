<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Clanok;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Clanok $clanok) {
        request()->validate([
            'obsah' => ['required', 'min:3', 'max:255']
        ]);

        $comment = Comment::create([
            'obsah' => request('obsah'),
            'clanok_id' => $clanok->id,
            'user_id' => Auth::id()
        ]);
        return response()->json([
            'user' => Auth::user()->name,
            'created_at' => $comment->created_at->format('Y-m-d H:i:s'),
            'obsah' => $comment->obsah
        ]);
    }

    public function destroy(Clanok $clanok, Comment $comment) {
        $comment->delete();
        return redirect('/clanok/' . $clanok->id);
    }
}


