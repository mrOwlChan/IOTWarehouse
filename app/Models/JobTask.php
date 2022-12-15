<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobTask extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'desc',
        'enable_status',

        // Foreign key
        'job_position_id'
    ];
}
