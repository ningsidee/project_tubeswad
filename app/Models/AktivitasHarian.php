<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AktivitasHarian extends Model
{
    protected $table = 'aktivitas_harian';

    protected $fillable = [
        'user_id',
        'tanggal',
        'jumlah_langkah',
        'waktu_tidur',
        'waktu_bangun',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function polaMakan()
    {
        return $this->hasMany(PolaMakan::class, 'aktivitas_harian_id');
    }
}
