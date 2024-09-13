<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'phone', 'address', 'membership_start', 'membership_end'
    ];
    
    protected $dates = [
        'membership_start',
        'membership_end',
    ];

    // Один клієнт має один абонемент (One-to-One)
    public function membership()
    {
        return $this->hasOne(Membership::class);
    }

    // Один клієнт може брати участь у багатьох тренувальних сесіях (One-to-Many)
    public function trainingSessions()
    {
        return $this->hasMany(TrainingSession::class);
    }

    // Багато клієнтів можуть брати участь у багатьох тренуваннях (Many-to-Many)
    public function trainings()
    {
        return $this->belongsToMany(Training::class, 'client_training', 'client_id', 'training_id')
                    ->withTimestamps();
    }
}
