<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'gender'];
    protected $casts = [
        'gender' => 'string'
    ]
    public function services(): HasMany
    {
        return $this->hasMany(Appointment::class);
    }
}
