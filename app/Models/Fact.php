<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fact extends Model
{
    /** @use HasFactory<\Database\Factories\FactFactory> */
    use HasFactory;

    protected $fillable = [
        'memory_id',
        'type',
        'attribute',
        'value',
    ];

    public function memory()
    {
        return $this->belongsTo(Memory::class, 'memory_id');
    }
}
