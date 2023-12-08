<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job_pelamar extends Model
{
    use HasFactory;
    public function profile()
    {
        return $this->belongsTo(Profile::class, 'profileId');
    }

    public function job()
    {
        return $this->belongsTo(Job::class, 'jobId');
    }
}
