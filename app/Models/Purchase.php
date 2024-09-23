<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $table = 'purchases';

    protected $fillable = [
        'purchase_date',
        'total_price',
        'user_id',
        'product_id',
        'training_session_id',
    ];

    public $timestamps = false;

    protected $casts = [
        'purchase_date' => 'datetime',
        'total_price' => 'decimal:2',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function trainingSession()
    {
        return $this->belongsTo(TrainingSession::class);
    }
}
