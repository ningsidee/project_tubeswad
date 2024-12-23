<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Community extends Model
{
    use HasFactory;
    //
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'community';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'time',
        'description',
    ];
    protected $casts = [
        'time' => 'datetime',
    ];

    /**
     * Get the participants for the community.
     */
    public function participants()
    {
        return $this->hasMany(ParticipantCommunity::class, 'ComunityID');
    }
}
