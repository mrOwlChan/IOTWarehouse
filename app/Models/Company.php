<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'enable_status',
        'name',
        'phone',
        'email',
        'address_street',
        'desc',

        // Foreign Key
        'city_id',
        'comp_sector_id',
        'subdistrict_id',
        'urban_village_id'
    ];

    // Relasi dengan table job_positions
    public function user(){
        return $this->hasMany(User::class);
    }

    // Relasi dengan table comp_sector
    public function comp_sector(){
        return $this->belongsTo(CompSector::class);
    }

    // Relasi dengan table cities
    public function city(){
        return $this->belongsTo(City::class);
    }
    
    // Relasi dengan table subdistricts
    public function subdistrict(){
        return $this->belongsTo(Subdistrict::class);
    }

    // Relasi dengan table urban_villages
    public function urban_village(){
        return $this->belongsTo(UrbanVillage::class);
    }

}
