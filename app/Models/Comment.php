<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
    protected $fillable = ['obsah', 'user_id', 'clanok_id'];
    //
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function clanok() {
        return $this->belongsTo(Clanok::class);
    }
}
