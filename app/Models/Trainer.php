<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    protected $table = 'trainers';

    protected $fillable = [
        'first_name',
        'last_name',
        'specialization',
    ];

    public function trainingSessions()
    {
        return $this->hasMany(TrainingSession::class);
    }
}
