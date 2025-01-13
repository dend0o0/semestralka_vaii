<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GalleryImage extends Model
{
    //
    protected $table = 'gallery_images';
    protected $fillable = ['img', 'name', 'description', 'clanok_id'];

    public function clanok() {
        return $this->belongsTo(Clanok::class);
    }
}
