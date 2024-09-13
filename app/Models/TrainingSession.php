<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingSession extends Model
{
    use HasFactory;

    protected $fillable = [
        'date', 'time', 'client_id', 'training_id'
    ];

    // Одна сесія належить одному клієнту (Many-to-One)
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    // Одна сесія належить одному тренуванню (Many-to-One)
    public function training()
    {
        return $this->belongsTo(Training::class);
    }
}
