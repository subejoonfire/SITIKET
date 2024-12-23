<?php

namespace App\Models;

use App\Models\Department;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ticket extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'ticketcode',
        'iduser',
        'idmodule',
        'idcategory',
        'idpriority',
        'attachment',
        'issue',
        'detailissue',
        'category',
        'status',
        'trouble'
    ];

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class, 'iduser');
    }
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
    public function users_tickets(): HasMany
    {
        return $this->hasMany(UsersTickets::class, 'idticket');
    }
    public function messages(): HasMany
    {
        return $this->hasMany(Message::class, 'idticket', 'id');
    }
    public function followups(): HasMany
    {
        return $this->hasMany(Followup::class, 'idticket');
    }
}
