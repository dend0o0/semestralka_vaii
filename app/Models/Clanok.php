<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Clanok extends Model
{
    protected $table = 'clanky';
    protected $fillable = ['nazov', 'lat_nazov', 'obsah', 'obrazok', 'user_id', 'max_teplota', 'min_teplota', 'kvitnuca', 'category_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }
}
