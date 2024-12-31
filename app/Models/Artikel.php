<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Artikel extends Model
{
    protected $table = 'articles';

    protected $fillable = ['id', 'user_id', 'image', 'link', 'tanggal', 'title', 'description'];

    public function getImageUrlAttribute()
    {
        return $this->image ? Storage::url($this->image) : asset('images/default-article.jpg');
    }

    public function getAuthorAttribute()
    {
        return $this->user->name ?? 'Anonymous';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
