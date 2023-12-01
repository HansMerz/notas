<?php

namespace App\Http\Controllers;

use App\Models\Notes;
use Illuminate\Http\Request;

class NotesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('notes.index', [
            'notes' => Notes::with('user')->where('user_id', auth()->user()->getAuthIdentifier())->latest()->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'min:3', 'max:255'],
            'description' => ['required', 'min:5', 'max:255']
        ]);
        $request->user()->notes()->create($validated);
        return to_route('notes.index')->with('status', __('Note created succesfully!'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Notes $notes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Notes $note)
    {
        $this->authorize('update', $note);
        return view('notes.edit', [
            'note' => $note
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Notes $note)
    {
        $this->authorize('update', $note);

        $validated = $request->validate([
            'title' => ['required', 'min:3', 'max:255'],
            'description' => ['required', 'min:5', 'max:255']
        ]);
        $note->update($validated);
        return to_route('notes.index')->with('status', __('Note updated succesfully!'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Notes $note)
    {
        $this->authorize('delete', $note);
        $note->delete();
        return to_route('notes.index')->with('status', __('Note deleted succesfully!'));
    }
}
