<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

abstract class Person extends Model
{
    protected $table = 'people';

    protected $fillable = [
        'email', 
        'phone_number', 
        'name', 
        'surname', 
        'birth_date',
        'isAdmin',
    ];

    protected $casts = [
        'birth_date' => 'datetime',
        'isAdmin' => 'boolean',
    ];

    public $timestamps = true;
}
