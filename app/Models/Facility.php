<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'location', 'capacity'
    ];

    // Одна зала може мати багато тренувань (One-to-Many)
    public function trainings()
    {
        return $this->hasMany(Training::class);
    }
}
