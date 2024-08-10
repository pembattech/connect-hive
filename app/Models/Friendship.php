<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Friendship extends Model
{
    use HasFactory;

    protected $primaryKey = 'FriendshipID';

    protected $fillable = [
        'UserID1', 'UserID2', 'Status'
    ];

    public function user1()
    {
        return $this->belongsTo(User::class, 'UserID1');
    }

    public function user2()
    {
        return $this->belongsTo(User::class, 'UserID2');
    }
}
