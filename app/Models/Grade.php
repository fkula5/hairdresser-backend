<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Grade extends Model
{
    use HasFactory;

    protected $fillable = ['appointment_id', 'grade'];

    public function appointment(): BelongsTo
    {
        return $this->belongsTo(Appointment::class);
    }
}
