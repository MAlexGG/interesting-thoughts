<?php

namespace App\Http\Controllers;

use App\Models\Thought;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ThoughtController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        $user = Auth::user();
        $thought = Thought::create([
            'thought' => $request->thought,
            'author' => $request->author,
            'image' => $request->image,
            'user_id' => $user->id
        ]);

        $thought->save();
        return redirect()->route('show', $thought->id);
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
        $user = Auth::user();
        $thought = Thought::find($id);
        if ($user->id == $thought->user_id) {
            $thought->update([
                'thought' => $request->thought,
                'author' => $request->author,
                'image' => $request->image
            ]);
        }

        return redirect()->route('show', $id);
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
        if ($user->id == $thought->user_id) {
            $thought->delete();
        }

        return redirect()->route('thoughts');
    }

    public function searchByAuthor(Request $request)
    {
        $thoughts = Thought::searchByAuthor($request);
        return view('/thoughts/search', compact('thoughts'));
    }
}
