<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Followup extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'idticket',
        'iduser_pic',
        'status',
    ];

    public function tickets(): BelongsTo
    {
        return $this->belongsTo(Ticket::class, 'idticket');
    }
    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class, 'iduser_pic');
    }
}
