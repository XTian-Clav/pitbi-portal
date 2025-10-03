<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Startups extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'startup_name',
        'founder',
        'submission_date',
        'status',
    ];
}
