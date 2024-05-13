<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Salon extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'street',
        'local_number',
        'city',
        'post_code',
        'phone_number',
        'opening_hours',
    ];
    public function employees(): BelongsToMany
    {
        return $this->belongsToMany(Employee::class);
    }

    public function services(): HasMany
    {
        return $this->hasMany(Service::class);
    }
}
