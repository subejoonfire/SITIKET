<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserTicket extends Model
{
    protected $fillable = ['iduser', 'idticket', 'datetime'];
}
