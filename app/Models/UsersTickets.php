<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UsersTickets extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'iduser',
        'iduser_pic',
        'idticket',
    ];

    public function user(): HasMany
    {
        return $this->hasMany(User::class, 'iduser');
    }
    public function user_pic(): HasMany
    {
        return $this->hasMany(User::class, 'iduser_pic');
    }
}
