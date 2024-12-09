<?php

namespace App\Models;

use App\Models\Pic;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ticket extends Model
{
    use HasFactory;
    protected $fillable = ['idpic', 'iduser', 'status', 'trouble'];

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class, 'iduser');
    }
    public function pics(): BelongsTo
    {
        return $this->belongsTo(Pic::class, 'idpic');
    }
}
