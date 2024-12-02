<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $table = "user";
    protected $primaryKey = 'iduser';
    protected $fillable = ['iddepartment', 'username', 'password', 'level'];
    public function department()
    {
        return $this->belongsTo(Department::class, 'iddepartment', 'iddepartment');
    }
}
