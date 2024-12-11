<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Module extends Model
{
    use HasFactory;
    protected $fillable = [
        'modulename',
    ];

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class, 'iduser');
    }
}
