<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    use HasFactory;

    protected $fillable = [
        'type', 'price', 'duration', 'client_id'
    ];

    // Один абонемент належить одному клієнту (One-to-One)
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
