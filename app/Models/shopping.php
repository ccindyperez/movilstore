<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class shopping extends Model
{
    use HasFactory;
    protected $table = 'shoppings'; // Especifica el nombre exacto de la tabla

    protected $fillable = [
        'keyproduct', 
        'username', 
        'datebuy', 
        'subtotal', 
        'total'
    ];
}
