<?php

namespace App\Http\Controllers;

use App\Models\Thought;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ThoughtController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $thoughts = Thought::orderByDesc();
        return view('/thoughts/home', compact('thoughts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/thoughts/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'thought' => 'required|max:500',
            'author' => 'required|max:255',
            'image' => 'required|image'
        ]);

        $user = Auth::user();
        $thought = Thought::create([
            'thought' => $request->thought,
            'author' => $request->author,
            'image' => $request->image,
            'user_id' => $user->id
        ]);

        if ($request->hasFile('image')) {
            $thought['image'] = $request->file('image')->store('img', 'public');
        }

        $thought->save();
        return redirect()->route('show', $thought->id)->with(['message' => 'The thought has been created successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $thought = Thought::find($id);
        return view('/thoughts/show', compact('thought'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $thought = Thought::find($id);
        return view('/thoughts/edit', compact('thought'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'thought' => 'required|max:500',
            'author' => 'required|max:255',
            'image' => 'image'
        ]);

        $user = Auth::user();
        $thought = Thought::find($id);

        $destination = public_path("storage\\" . $thought->image);
        $filename = '';

        if ($request->hasFile('image')) {
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $filename = $request->file('image')->store('img', 'public');
        } else {
            $filename = $thought->image;
        }

        if ($user->id == $thought->user_id) {
            $thought->update([
                'thought' => $request->thought,
                'author' => $request->author,
                'image' => $filename
            ]);
        }

        return redirect()->route('show', $id)->with(['message' => 'The thought has been edited successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Auth::user();
        $thought = Thought::find($id);
        $destination = public_path("storage\\" . $thought->image);

        if ($user->id == $thought->user_id) {
            $thought->delete();
            File::delete($destination);
        }

        return redirect()->route('thoughts')->with(['message' => 'The thought has been deleted successfully']);
    }

    public function searchByAuthor(Request $request)
    {
        $thoughts = Thought::searchByAuthor($request->search);
        return view('/thoughts/search', compact('thoughts'));
    }

    /**
     * Devolviendo todos los thoughts y poniendo la condición en la vista
     */

    public function getFavorites()
    {
        $thoughts = Thought::all();
        return view('/thoughts/favorites', compact('thoughts'));
    }

    /**
     * Devolviendo los thoughts precisos desde el modelo
     */

    /* public function getFavorites()
    {
        $user = Auth::user();
        $thoughts = Thought::getFavoritesByUserId($user->id);

        return view('/thoughts/favorites', compact('thoughts'));
    } */


    public function isFavorite($id)
    {
        $user = Auth::user();
        $thought = Thought::find($id);
        $thought->favorites()->attach($user);

        return redirect()->route('favs');
    }

    public function isNotFavorite($id)
    {
        $user = Auth::user();
        $thought = Thought::find($id);
        $thought->favorites()->detach($user);

        return redirect()->route('thoughts');
    }
}
