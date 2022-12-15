<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'city_id',
        'type',
        'postal_code',
        'province_code',
        'enable_status',
        'district',
        'subdistrict',
        'subdistrict_postal',
            
        // Foreign Key
        'province_id'
    ];
}
