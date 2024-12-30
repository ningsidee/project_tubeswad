<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Indikator extends Model
{

    // Tentukan tabel yang digunakan (opsional jika nama tabel sesuai konvensi)
    protected $table = 'indikator_kesehatan';

    // Kolom yang bisa diisi melalui mass assignment
    protected $fillable = [
        'user_id',
        'height',
        'weight',
        'sleep_time',
        'wake_time',
    ];

    /**
     * Relasi dengan model User.
     * Setiap indikator kesehatan milik satu pengguna.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Aksesor untuk menghitung durasi tidur (opsional).
     * Menghitung selisih antara waktu tidur dan waktu bangun.
     */
    public function getSleepDurationAttribute()
    {
        if ($this->sleep_time && $this->wake_time) {
            $sleepTime = strtotime($this->sleep_time);
            $wakeTime = strtotime($this->wake_time);

            // Jika waktu bangun lebih kecil dari waktu tidur, berarti melewati tengah malam
            if ($wakeTime < $sleepTime) {
                $wakeTime += 24 * 3600; // Tambahkan 24 jam dalam detik
            }

            return gmdate('H:i', $wakeTime - $sleepTime);
        }

        return null; // Jika salah satu waktu kosong
    }
}
