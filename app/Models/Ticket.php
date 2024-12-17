<?php

namespace App\Models;

use App\Models\Department;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ticket extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'ticketcode',
        'iduser',
        'iddepartment',
        'idmodule',
        'idcategory',
        'iduser_pic',
        'issue',
        'detailissue',
        'priority',
        'category',
        'status',
        'trouble'
    ];

    // public function users(): BelongsTo
    // {
    //     return $this->belongsTo(User::class, 'iduser');
    // }
    // public function users_pic(): BelongsTo
    // {
    //     return $this->belongsTo(User::class, 'iduser_pic');
    // }
    // public function departments(): BelongsTo
    // {
    //     return $this->belongsTo(Department::class, 'iddepartment');
    // }
    public function categories(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'idcategory');
    }
    public function priorities(): BelongsTo
    {
        return $this->belongsTo(Priority::class, 'idpriority');
    }
    public function modules(): BelongsTo
    {
        return $this->belongsTo(Module::class, 'idmodule');
    }
    public function userstickets(): BelongsTo
    {
        return $this->belongsTo(UsersTickets::class, 'id', 'idticket');
    }
}
