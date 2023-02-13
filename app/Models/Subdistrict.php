<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subdistrict extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'enable_status',

        // Foreign Key
        'city_id'
    ];

    // Relasi dengan table users
    public function users(){
        return $this->hasMany(User::class);
    }
}
