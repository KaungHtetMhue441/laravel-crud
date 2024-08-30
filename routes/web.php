<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\QuestionController;

Route::get('/', function () {
    return view('welcome');
});

Route::get("login")->name("login");

// Route::resource('questions', QuestionController::class);

Route::get('/questions', [QuestionController::class, 'index'])->name('questions.index');

Route::get('/questions/create', [QuestionController::class, 'create'])->name('questions.create');

Route::post('/questions', [QuestionController::class, 'store'])->name('questions.store');

Route::get('/questions/{question}', [QuestionController::class, 'show'])->name('questions.show');

Route::get('/questions/{question}/edit', [QuestionController::class, 'edit'])->name('questions.edit');

Route::put('/questions/{question}', [QuestionController::class, 'update'])->name('questions.update');

Route::patch('/questions/{question}', [QuestionController::class, 'update'])->name('questions.update');

Route::delete('/questions/{question}', [QuestionController::class, 'destroy'])->name('questions.destroy');
Route::resource('questions.answers', AnswerController::class)->only(['store', 'destroy']);
