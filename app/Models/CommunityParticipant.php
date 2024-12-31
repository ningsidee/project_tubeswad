<?php

namespace App\Models;

use App\Models\User;
use App\Models\Community;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CommunityParticipant extends Model
{
    use HasFactory;

    protected $fillable = ['community_id', 'user_id', 'role', 'joined_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function community()
    {
        return $this->belongsTo(Community::class);
    }

    public function isAdmin()
    {
        return $this->role === 'admin';
    }
}
