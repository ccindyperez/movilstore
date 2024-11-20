<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $fillable = ['name','description','category','count','status','price'];
    public function category()
    {
        return $this->belongsTo(category::class, 'category', 'id');
        // 'category' es la clave foránea en la tabla products.
        // 'id' es la clave primaria en la tabla categories.
    }
}
