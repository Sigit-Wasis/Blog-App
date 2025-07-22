<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KategoriBlog extends Model
{
    protected $table = 'kategori_blog';

    protected $fillable = [
        'kategori',
        'slug',
        'keterangan',
    ];
}
