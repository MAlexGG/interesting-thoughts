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
        'user_id'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    static function orderByDesc()
    {
        $thoughts = Thought::orderBy('id', 'DESC')->get();
        return $thoughts;
    }

    static function searchByAuthor($request)
    {
        $thought = Thought::where('author', 'like', $request->input('search') . '%')->get();
        return $thought;
    }
}
