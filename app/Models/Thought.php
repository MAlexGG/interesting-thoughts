<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thought extends Model
{
    use HasFactory;

    protected $fillable = [
        'thought',
        'author',
        'image',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
