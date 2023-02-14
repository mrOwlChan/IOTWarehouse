<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',

        // Attribute yang ditambahkan
        'phone',
        'photo',
        'birth_date',
        'birth_city',
        'address_street',
        'enable_status',

        // Foreign Key
        'city_id',
        'company_id',
        'job_position_id',
        'subdistrict_id',
        'urban_village_id',    
    ];

    // Attribute yang memiliki nilai default
    protected $attributes = [
        'city_id'           => 1,
        'subdistrict_id'    => 1,
        'urban_village_id'  => 1
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Format tanggal
    protected $dates = ['birth_date']; 
    
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
