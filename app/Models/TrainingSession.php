<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingSession extends Model
{
    protected $table = 'training_sessions';

    protected $fillable = [
        'name',
        'session_date',
        'description',
        'price',
        'trainer_id',
    ];

    protected $casts = [
        'session_date' => 'datetime',
        'price' => 'decimal:2',
    ];

    public function trainer()
    {
        return $this->belongsTo(Trainer::class);
    }

    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }
}