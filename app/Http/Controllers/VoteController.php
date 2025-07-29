<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vote;

class VoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Vote::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        // Valida os dados recebidos
        $data = $request->validate([
            'user_id' => 'required|integer',  // Identificador do usuário
            'answer_option_id' => 'required|exists:answer_options,id', // Verifica se a opção de resposta existe
            'question_id' => 'required|exists:questions,id', // Verifica se a pergunta existe
        ]);

        // Cria e retorna o novo voto
        return Vote::create($data);
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Vote::findOrFail($id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Vote::destroy($id);
        return response()->noContent();
    }
}
