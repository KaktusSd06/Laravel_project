<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description', 'trainer_id'
    ];

    // Одне тренування належить одному тренеру (Many-to-One)
    public function trainer()
    {
        return $this->belongsTo(Trainer::class);
    }

    // Багато клієнтів можуть відвідувати багато тренувань (Many-to-Many)
    public function clients()
    {
        return $this->belongsToMany(Client::class, 'client_training', 'training_id', 'client_id')
                    ->withTimestamps();
    }

    // Одне тренування проходить в одній залі (Many-to-One)
    public function facility()
    {
        return $this->belongsTo(Facility::class);
    }
}
