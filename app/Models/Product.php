<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description', 'price', 'stock'
    ];

    // Один товар може мати багато коментарів (One-to-Many)
    public function comments()
    {
        return $this->hasMany(ProductComment::class);
    }
}
