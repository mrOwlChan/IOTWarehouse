<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompSector extends Model
{
    use HasFactory;

    protected $fillable = [
        'enable_status',
        'name',
        'desc'
    ];
}
