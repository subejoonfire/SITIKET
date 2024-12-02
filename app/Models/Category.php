<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $table = 'category';
    protected $primaryKey = 'idcategory';
    protected $fillable = ['categoryname'];

    /**
     * Relasi ke model Ticket.
     */
    public function tickets()
    {
        return $this->hasMany(Ticket::class, 'idcategory', 'idcategory');
    }
}
