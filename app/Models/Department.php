<?php

namespace App\Models;

use App\Models\User;
use App\Models\Ticket;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Department extends Model
{
    use HasFactory;
    protected $fillable = ['departmentname'];

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class, 'iduser');
    }
}
