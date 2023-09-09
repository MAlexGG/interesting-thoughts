<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    /**
     * Para que el método devuelva directamente los thoughts del usuario registrado que existan en la tabla.
     */
    
    /* static function getFavoritesByUserId($id)
    {
        $thoughtsId = DB::table('thought_user')->select('thought_id')->where('user_id', $id)->get()->pluck('thought_id')->toArray();
        $thoughts = Thought::whereIn('id', $thoughtsId)->get();
        return $thoughts;
    } */
}
