<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserDepartment extends Model
{
    protected $fillable = ['iduser', 'iddepartment', 'datetime'];

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class, 'iduser');
    }
    public function departments(): BelongsTo
    {
        return $this->belongsTo(Department::class, 'iddepartment');
    }
}
