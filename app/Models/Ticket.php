<?php

namespace App\Models;

use App\Models\Department;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ticket extends Model
{
    use HasFactory;
    protected $fillable = ['iddepartment', 'status', 'trouble'];

    public function departments()
    {
        return $this->belongsTo(Department::class, 'iddepartment');
    }
}
