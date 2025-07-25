<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'blog';

    protected $fillable = [
        'title',
        'slug',
        'content',
        'image',
        'created_by',
        'kategori_id',
    ];
}
