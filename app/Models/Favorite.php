<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Thought;
use App\Models\User;

class Favorite extends Model
{
    use HasFactory;

    protected $fillable = [
        'thought_id',
        'user_id'
    ];

    public function thought()
    {
        return $this->belongsTo(Thought::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
