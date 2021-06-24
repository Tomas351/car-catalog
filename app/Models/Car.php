<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $table = 'cars';
    public $timestamps = true;

    protected $casts = [
        'price' => 'integer',
        'horsepower' => 'integer',
        'max_speed' => 'integer',
        'fuel_tank_capacity' => 'integer'
    ];

    protected $fillable = [
        'brand',
        'model',
        'fuel_type',
        'fuel_tank_capacity',
        'max_speed',
        'price',
        'color',
        'description',
        'horsepower',
        'transmission',
        'created_at'
    ];
}