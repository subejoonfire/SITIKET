<?php

namespace App\Models;

use App\Models\User;
use App\Models\Ticket;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Department extends Model
{
    use HasFactory;
    protected $table = 'department';
    protected $primaryKey = 'iddepartment';
    protected $fillable = ['departmentname'];

    /**
     * Relasi ke model User.
     */
    public function users()
    {
        return $this->hasMany(User::class, 'iddepartment', 'iddepartment');
    }

    /**
     * Relasi ke model Ticket.
     */
    public function tickets()
    {
        return $this->hasMany(Ticket::class, 'iddepartment', 'iddepartment');
    }
}
