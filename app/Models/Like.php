<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    protected $primaryKey = 'LikeID';

    protected $fillable = [
        'PostID', 'UserID',
    ];

    public function post()
    {
        return $this->belongsTo(Post::class, 'PostID');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'UserID');
    }
}
