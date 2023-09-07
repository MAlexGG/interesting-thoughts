<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Thought extends Model
{
    use HasFactory;

    protected $fillable = [
        'thought',
        'author',
        'image',
        'user_id'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function favorites(){
        return $this->belongsToMany(User::class);
    }

    static function orderByDesc()
    {
        $thoughts = Thought::orderBy('id', 'DESC')->get();
        return $thoughts;
    }

    static function searchByAuthor($search)
    {
        $thought = Thought::where('author', 'like', '%' . $search . '%')->orderBy('id', 'DESC')->get();
        return $thought;
    }
}
