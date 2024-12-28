<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
        protected $table = 'articles';
    
        protected $fillable = [
            'id',
            'user_id',
            'image',
            'link',
            'tanggal',
            'created_at',
        ];
}
