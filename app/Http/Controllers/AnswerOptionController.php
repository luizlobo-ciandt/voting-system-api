<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AnswerOption;

class AnswerOptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($questionId)
    {
        return AnswerOption::where('question_id', $questionId)->get();
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return AnswerOption::findOrFail($id);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $questionId)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image_url' => 'nullable|string'
        ]);
        $data['question_id'] = $questionId;
        return AnswerOption::create($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $questionId, $id) // Adiciona questionId
    {
        $answerOption = AnswerOption::where('id', $id)
                                    ->where('question_id', $questionId)
                                    ->firstOrFail(); 
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image_url' => 'nullable|string',
        ]);
    
        // Atualiza a opção de resposta
        $answerOption->update($data);
        return $answerOption;    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        AnswerOption::destroy($id);
        return response()->noContent();
    }

}
