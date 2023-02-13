<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'enable_status',
        'name',
        'province_code'
    ];

    // Relasi dengan table cities
    public function city(){
        return $this->hasMany(City::class);
    }
}
