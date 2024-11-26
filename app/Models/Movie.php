<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Movie extends Model
{
    //
    protected $fillable =['title', 'description', 'photo', 'publish_date', 'genre_id'];

    public function genre() {
        return $this->belongsTo(Genre::class);
    }
}
