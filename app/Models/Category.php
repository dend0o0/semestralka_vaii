<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Category extends Model

{
    /** @use \Illuminate\Database\Eloquent\Factories\HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, \Illuminate\Notifications\Notifiable;
    protected $fillable = ['name_category'];
    public $timestamps = false;
    public function articles() {
        return $this->hasMany(Clanok::class);
    }
}
