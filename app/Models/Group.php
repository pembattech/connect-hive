<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $primaryKey = 'GroupID';

    protected $fillable = [
        'GroupName', 'Description', 'AdminID',
    ];

    public function admin()
    {
        return $this->belongsTo(User::class, 'AdminID');
    }

    public function members()
    {
        return $this->hasMany(GroupMembership::class, 'GroupID');
    }
}
