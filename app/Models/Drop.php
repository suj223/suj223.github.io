<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drop extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'hours',
        'is_active',
        'image',
        'is_left',
        'is_right'
    ];
}
