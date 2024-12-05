<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserTicket extends Model
{
    protected $fillable = ['iduser', 'idticket', 'datetime'];

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class, 'iduser', 'id');
    }
    public function tickets(): BelongsTo
    {
        return $this->belongsTo(Ticket::class, 'idticket', 'id');
    }
}
