<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $primaryKey = 'CommentID';

    protected $fillable = [
        'PostID', 'UserID', 'Content', 'ParentCommentID',
    ];

    public function post()
    {
        return $this->belongsTo(Post::class, 'PostID');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'UserID');
    }

    public function parentComment()
    {
        return $this->belongsTo(Comment::class, 'ParentCommentID');
    }

    public function childComments()
    {
        return $this->hasMany(Comment::class, 'ParentCommentID');
    }
}
