<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnswerOptionController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\VoteController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// Rotas para perguntas
Route::prefix('questions')->group(function () {
    Route::get('/', [QuestionController::class, 'index']);                        // Listar todas as perguntas
    Route::get('/{id}', [QuestionController::class, 'show']);                      // Obter uma pergunta específica
    Route::post('/', [QuestionController::class, 'store']);                        // Criar uma nova pergunta
    Route::put('/{id}', [QuestionController::class, 'update']);                    // Atualizar uma pergunta existente
    Route::delete('/{id}', [QuestionController::class, 'destroy']);                // Remover uma pergunta
});


Route::prefix('questions/{questionId}/answer-options')->group(function () {
    Route::get('/', [AnswerOptionController::class, 'index']);
    Route::get('/{id}', [AnswerOptionController::class, 'show']);
    Route::post('/', [AnswerOptionController::class, 'store']);
    Route::put('/{id}', [AnswerOptionController::class, 'update']);
    Route::delete('/{id}', [AnswerOptionController::class, 'destroy']);
});

// Rotas para votos
Route::prefix('votes')->group(function () {
    Route::get('/', [VoteController::class, 'index']);                             // Listar todos os votos
    Route::get('/{id}', [VoteController::class, 'show']);                          // Obter um voto específico
    Route::post('/', [VoteController::class, 'store']);                            // Criar um novo voto
    Route::delete('/{id}', [VoteController::class, 'destroy']);                    // Remover um voto
});