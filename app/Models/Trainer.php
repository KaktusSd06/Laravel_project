<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'specialization', 'email', 'phone'
    ];

    // Один тренер проводить багато тренувань (One-to-Many)
    public function trainings()
    {
        return $this->hasMany(Training::class);
    }
}
