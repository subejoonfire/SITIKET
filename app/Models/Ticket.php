<?php

namespace App\Models;

use App\Models\Department;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ticket extends Model
{
    use HasFactory;
    protected $fillable = ['iddepartment', 'iduser', 'status', 'trouble'];

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class, 'iduser');
    }
    public function departments(): BelongsTo
    {
        return $this->belongsTo(Department::class, 'iddepartment');
    }
}
