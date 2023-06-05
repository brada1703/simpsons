<?php

namespace App\Models;

use App\Models\Traits\UseUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    use HasFactory, UseUuid;

    public $timestamps = false;

    protected $appends = [
        'full_name'
    ];

    protected $fillable = [
        'id',
        'first_name',
        'last_name'
    ];

    // Attributes
    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    // Relationships
    public function quotes()
    {
        return $this->hasMany(Quote::class);
    }

}
