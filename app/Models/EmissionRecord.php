<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmissionRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'transport',
        'fuel_type',
        'distance',
        'emission',
        'trees',
    ];
}
