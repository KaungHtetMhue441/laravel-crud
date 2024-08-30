<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index()
    {
        $questions = Question::with('answers')->get();
        return view('questions.index', compact('questions'));
    }

    public function create()
    {
        return view('questions.create');
    }

    public function store(Request $request)
    {
        // Validate the input
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'answers.*.body' => 'required|string',
            'correct' => 'required|integer|min:0|max:3',
        ]);

        // Create the question
        $question = Question::create([
            'title' => $request->input('title'),
            'body' => $request->input('body'),
        ]);

        // Create the answers
        $question->answers()->createMany($request->input('answers'));
        // foreach ($request->input('answers') as $index => $answerData) {
        //     $question->answers()->create([
        //         'body' => $answerData['body'],
        //         'correct' => $index == $request->input('correct'),
        //     ]);
        // }

        return redirect()->route('questions.index')->with('success', 'Question and answers created successfully.');
    }

    public function show(Question $question)
    {
        return view('questions.show', compact('question'));
    }

    public function edit(Question $question)
    {
        return view('questions.edit', compact('question'));
    }

    public function update(Request $request, Question $question)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        $question->update($request->all());
        return redirect()->route('questions.index')->with('success', 'Question updated successfully.');
    }

    public function destroy(Question $question)
    {
        $question->delete();
        return redirect()->route('questions.index')->with('success', 'Question deleted successfully.');
    }
}
