<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTagRequest;
use App\Http\Requests\UpdateTagRequest;
use App\Models\Note;
use Illuminate\Http\Request;
use Spatie\Tags\Tag;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Tag::query()
                    ->latest()
                    ->paginate(10);
    
        return view('tag.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tag.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTagRequest $request)
    {

        $validated = $request->validated();

        $tag = Tag::findOrCreate($validated['name']); //store in the current locale of your app

        //let's add some translation for other languages
        $tag->setTranslation('name', 'id', $validated['indonesia']);

        //don't forget to save the model
        $tag->save();

        return to_route('tag.index')->with('success', 'Tag created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag)
    {
        $data = $tag;
        return view('tag.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTagRequest $request, Note $note)
    {

        $validated = $request->validated();

        $tag = Tag::findOrCreate($validated['name']); //store in the current locale of your app

        //let's add some translation for other languages
        $tag->setTranslation('name', 'id', $validated['indonesia']);

        //don't forget to save the model
        $tag->save();

        return to_route('tag.index')->with('success', 'Tag created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
