<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Question::all();
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return Question::with('options')->findOrFail($id); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'show_option_total' => 'boolean',
            'voting_active' => 'boolean',
        ]);
        
        return Question::create($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $question = Question::findOrFail($id);

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'show_option_total' => 'boolean',
            'voting_active' => 'boolean',
        ]);

        $question->update($data);
        return $question;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Question::destroy($id); 
        return response()->noContent();
    }
}
