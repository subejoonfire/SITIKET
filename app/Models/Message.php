<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Message extends Model
{
    protected $fillable = [
        'idticket',
        'iduser_from',
        'iduser_to',
        'message',
    ];
    public function tickets(): BelongsTo
    {
        return $this->belongsTo(Ticket::class, 'idticket');
    }
    public function user_from(): BelongsTo
    {
        return $this->belongsTo(User::class, 'iduser_from');
    }
    public function user_to(): BelongsTo
    {
        return $this->belongsTo(User::class, 'iduser_to');
    }
}
