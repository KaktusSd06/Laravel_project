<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'name',
        'price',
    ];

    public function feedbacks()
    {
        return $this->hasMany(Feedback::class);
    }

    protected $casts = [
        'price' => 'decimal:2',
    ];
}