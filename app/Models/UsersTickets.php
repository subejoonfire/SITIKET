<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UsersTickets extends Model
{
    use HasFactory, SoftDeletes;
    protected $primaryKey = 'id';
    protected $fillable = [
        'iduser',
        'idticket',
        'validated',
    ];

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class, 'iduser');
    }
    public function tickets(): BelongsTo
    {
        return $this->belongsTo(Ticket::class, 'idticket');
    }
    public function pics(): HasMany
    {
        return $this->hasMany(Pics::class, 'iduserticket', 'id');
    }
}
