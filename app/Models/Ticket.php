<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use App\Models\Department;
use App\Models\UserTicket;
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

    public function tickets()
    {
        return $this->select('tickets.*')
            ->join('user_tickets', 'tickets.id', '=', 'user_tickets.idticket')
            ->join('users', 'users.id', '=', 'user_tickets.iduser')
            ->where('iduser', auth()->user()->id);
    }
    public function tickets_helpdesk()
    {
        return $this->belongsToMany(Ticket::class, 'user_tickets', 'idticket', 'id')
            ->leftJoin('departments', 'departments.id', '=', 'tickets.iddepartment')
            ->join('users', 'users.id', '=', 'user_tickets.iduser')
            ->select(
                'user_tickets.*',
                'users.*',
                'tickets.*',
                'departments.*',
            );
    }
    public function department()
    {
        return $this->belongsTo(Department::class, 'iddepartment');
    }
}
