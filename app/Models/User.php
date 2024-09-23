<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Person
{
    // Relationships
    public function memberships()
    {
        return $this->hasMany(Membership::class);
    }

    public function trainingSessions()
    {
        return $this->hasMany(TrainingSession::class);
    }
}