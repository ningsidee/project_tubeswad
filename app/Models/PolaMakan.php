<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PolaMakan extends Model
{
    use HasFactory;

    protected $table = 'pola_makan';

    protected $fillable = [
        'user_id',
        'tanggal',
        'nama_makanan',
        'total',
        'calories',
    ];

    public function aktivitasHarian()
    {
        return $this->belongsTo(AktivitasHarian::class, 'aktivitas_harian_id');
    }
}
