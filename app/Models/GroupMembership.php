<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupMembership extends Model
{
    use HasFactory;

    protected $primaryKey = 'MembershipID';

    protected $fillable = [
        'GroupID', 'UserID',
    ];

    public function group()
    {
        return $this->belongsTo(Group::class, 'GroupID');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'UserID');
    }
}
