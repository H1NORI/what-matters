<?php

namespace App\Models;

use App\Enums\MemoryStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Memory extends Model
{
    /** @use HasFactory<\Database\Factories\MemoryFactory> */
    use HasFactory;

    protected $fillable = [
        'contact_id',
        'content',
        'status',
    ];

    protected $attributes = [
        'status' => MemoryStatus::Pending->value,
    ];

    public function contact()
    {
        return $this->belongsTo(Contact::class, 'contact_id');
    }

    public function facts()
    {
        return $this->hasMany(Fact::class);
    }

    protected function casts(): array
    {
        return [
            'status' => MemoryStatus::class,
        ];
    }
}
