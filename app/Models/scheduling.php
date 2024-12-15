<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scheduling extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'time',
        'hari',
        'aktivitas',
        'repeat',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
