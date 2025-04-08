<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreNoteRequest;
use App\Http\Requests\UpdateNoteRequest;
use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $notes = Note::all();
            return response()->json([
                'status_code' => 200,
               'message' => 'Notes retrieved successfully',
                'data' => $notes
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status_code' => $th->getCode(),
               'message' => 'Something went wrong',
                'error' => $th->getMessage()
            ], $th->getCode());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNoteRequest $request)
    {
        try {
            $note = Note::create($request->validated());

            return response()->json([
                'status_code' => 200,
               'message' => 'Note created successfully',
                'data' => $note
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status_code' => $th->getCode(),
                'message' => 'Something went wrong',
                 'error' => $th->getMessage()
             ], $th->getCode());
        }

    }


    /**
     * Display the specified resource.
     */
    public function show(Note $note)
    {
        try {
            return response()->json([
                'status_code' => 200,
               'message' => 'Note retrieved successfully',
                'data' => $note
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status_code' => $th->getCode(),
               'message' => 'Something went wrong',
                'error' => $th->getMessage()
            ], $th->getCode());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNoteRequest $request, Note $note)
    {
        try {
            $note->update($request->validated());

            return response()->json([
                'status_code' => 200,
               'message' => 'Note updated successfully',
                'data' => $note
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status_code' => $th->getCode(),
               'message' => 'Something went wrong',
                'error' => $th->getMessage()
            ], $th->getCode());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Note $note)
    {
        try {
            $note->delete();

            return response()->json([
                'status_code' => 200,
               'message' => 'Note deleted successfully'
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status_code' => $th->getCode(),
               'message' => 'Something went wrong',
                'error' => $th->getMessage()
            ], $th->getCode());
        }
    }

}
