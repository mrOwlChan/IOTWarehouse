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

    // Relasi dengan table provinces
    public function province(){
        return $this->belongsTo(Province::class);
    } 

    // Relasi dengan table subdistricts
    public function subdistrict(){
        return $this->belongsTo(Subdistrict::class);
    }

    // Relasi dengan table users
    public function users(){
        return $this->hasMany(User::class);
    }
    
    // Relasi dengan table companies
    public function company(){
        return $this->hasMany(Company::class);
    }

}
