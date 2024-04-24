<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'second_name', 'phone_num', 'email', 'password'];

    public function appointments(): HasMany
    {
        return $this->hasMany(Appointment::class);
    }
}
