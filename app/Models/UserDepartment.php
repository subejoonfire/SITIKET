<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserDepartment extends Model
{
    protected $fillable = ['iduser', 'iddepartment', 'datetime'];
}
