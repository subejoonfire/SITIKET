<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Department;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ticket extends Model
{
    use HasFactory;
    protected $fillable = ['iddepartment', 'status', 'trouble'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'userticket', 'idticket', 'iduser')
            ->withPivot('datetime');
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'iddepartment');
    }
}
