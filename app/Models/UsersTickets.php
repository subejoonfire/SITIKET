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
    protected $fillable = [
        'iduser',
        'iduser_pic',
        'idticket',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'iduser');
    }
    public function user_pic(): BelongsTo
    {
        return $this->belongsTo(User::class, 'iduser_pic');
    }
}