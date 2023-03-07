<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Thought;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function store(Thought $thought)
    {
        Favorite::create([
            'thought_id' => $thought->id,
            'user_id' => Auth::user()->id
        ]);

        return redirect()->route('thoughts');
    }

    public function destroy(Thought $thought)
    {
        $favorite = Favorite::findFavoriteByUser($thought);
        $notFavorite = Favorite::find($favorite->id);
        $notFavorite->delete();

        return redirect()->route('thoughts');
    }
}
