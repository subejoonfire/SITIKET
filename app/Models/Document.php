<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Document extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'idmessage',
        'documentname',
    ];

    public function messages(): BelongsTo
    {
        return $this->belongsTo(Message::class, 'idmessage');
    }
}
