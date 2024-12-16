<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Message extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'idticket',
        'iduser_from',
        'iduser_to',
        'message',
    ];
    public function documents(): HasMany
    {
        return $this->hasMany(Document::class, 'idmessage', 'id');
    }
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
