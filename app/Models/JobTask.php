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

    // Relasi dengan table job_positions
    public function job_position(){
        return $this->belongsTo(JobPosition::class);
    }
}
