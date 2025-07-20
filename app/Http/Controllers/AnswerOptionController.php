<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AnswerOption;

class AnswerOptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return AnswerOption::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(['title' => 'required']);
        return AnswerOption::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(AnswerOption $answerOption)
    {
        return $answerOption;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AnswerOption $answerOption)
    {
        $answerOption->update($request->all());
        return $answerOption;    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AnswerOption $answerOption)
    {
        $answerOption->delete();
        return response()->no_content();
    }

}
