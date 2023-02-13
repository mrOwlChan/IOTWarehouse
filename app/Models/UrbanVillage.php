<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UrbanVillage extends Model
{
    use HasFactory;

    protected $fillable = [
        'enable_status',
        'name',
        'urban_village_code',

        // Foreign Key
        'subdistrict_id'
    ];

    // Relasi dengan table users
    public function users(){
        return $this->hasMany(User::class);
    }
}
