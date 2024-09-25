<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

abstract class Person extends Model
{
    protected $table = 'users';

    protected $fillable = [
        'name', 
        'surname', 
        'email', 
        'phone_number', 
        'birth_date', 
        'password',
        'isAdmin'
    ];

    protected $casts = [
        'birth_date' => 'datetime',
        'isAdmin' => 'boolean',
    ];

    public $timestamps = true;
}
