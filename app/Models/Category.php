<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name_category'];

    public function articles() {
        return $this->hasMany(Clanok::class);
    }
}
