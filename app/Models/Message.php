<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $primaryKey = 'MessageID';

    protected $fillable = [
        'SenderID', 'ReceiverID', 'Content', 'ReadStatus',
    ];

    public function sender()
    {
        return $this->belongsTo(User::class, 'SenderID');
    }

    public function receiver()
    {
        return $this->belongsTo(User::class, 'ReceiverID');
    }
}
