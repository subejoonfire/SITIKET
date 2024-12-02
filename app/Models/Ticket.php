<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Department;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ticket extends Model
{
    use HasFactory;
    protected $table = 'ticket';
    protected $primaryKey = 'idticket';
    protected $fillable = ['idcategory', 'iddepartment', 'username', 'phonenumber', 'trouble'];

    /**
     * Relasi ke model Category.
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'idcategory', 'idcategory');
    }

    /**
     * Relasi ke model Department.
     */
    public function department()
    {
        return $this->belongsTo(Department::class, 'iddepartment', 'iddepartment');
    }
}
