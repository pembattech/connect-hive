<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $primaryKey = 'PostID';

    protected $fillable = [
        'UserID', 'Content', 'ImageURL', 'VideoURL',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'UserID');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'PostID');
    }

    public function likes()
    {
        return $this->hasMany(Like::class, 'PostID');
    }
}
