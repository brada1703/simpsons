<?php

namespace App\Models;

use App\Models\Traits\UseUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    use HasFactory, UseUuid;

    public $timestamps = false;

    protected $perPage = 5;

    protected $fillable = [
        'id',
        'character_id',
        'quote',
    ];

    // Relationships
    public function character()
    {
        return $this->belongsTo(Character::class);
    }
}
