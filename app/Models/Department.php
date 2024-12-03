<?php

namespace App\Models;

use App\Models\User;
use App\Models\Ticket;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Department extends Model
{
    use HasFactory;
    protected $fillable = ['departmentname'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'userdepartment', 'iddepartment', 'iduser')
            ->withPivot('datetime');
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
