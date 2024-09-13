<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductComment extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id', 'product_id', 'comment', 'rating'
    ];

    // Один коментар належить одному клієнту (Many-to-One)
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    // Один коментар належить одному товару (Many-to-One)
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
