<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AnswerController extends Controller
{
    public function store(Request $request, Question $question)
    {
        // Validate the input
        $request->validate([
            'body' => 'required|string',
            'correct' => 'sometimes|boolean',
        ]);

        // Create the answer
        $question->answers()->create([
            'body' => $request->input('body'),
            'correct' => $request->input('correct', false),
        ]);

        return redirect()->route('questions.show', $question)->with('success', 'Answer submitted successfully.');
    }

    public function destroy(Question $question, Answer $answer)
    {
        $answer->delete();
        return redirect()->route('questions.show', $question)->with('success', 'Answer deleted successfully.');
    }
}
