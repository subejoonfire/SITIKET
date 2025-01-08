<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pics extends Model
{
    use SoftDeletes;
    protected $guarded = [''];
    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class, 'iduser_pic');
    }
}
