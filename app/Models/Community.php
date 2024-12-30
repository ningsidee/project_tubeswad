<?php

namespace App\Models;

use App\Models\Thread;
use App\Models\CommunityParticipant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Community extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'created_by', 'image'];

    public function participants()
    {
        return $this->hasMany(CommunityParticipant::class);
    }

    public function threads()
    {
        return $this->hasMany(Thread::class);
    }

    public function isAdmin($userId)
    {
        return $this->participants()->where('user_id', $userId)->where('role', 'admin')->exists();
    }
    
    public function isParticipant($userId)
    {
        return $this->participants()->where('user_id', $userId)->exists();
    }
}
