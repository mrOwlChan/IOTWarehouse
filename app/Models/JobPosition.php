<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobPosition extends Model
{
    use HasFactory;

    // attribute yang bisa di-update
    protected $fillable = [
        'enable_status',
        'name',
        'desc'
    ];

    // Relasi dengan table users
    public function user(){
        return $this->hasOne(User::class);
    }

    // Relasi dengan table job_tasks
    public function job_task(){
        return $this->hasMany(JobTask::class);
    }

}
