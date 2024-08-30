@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $question->title }}</h1>
    <p>{{ $question->body }}</p>
    <a href="{{ route('questions.edit', $question) }}" class="btn btn-warning">Edit</a>
    <form action="{{ route('questions.destroy', $question) }}" method="POST" class="d-inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>

    <hr>

    <h3>Answers</h3>
    @foreach ($question->answers as $answer)
    <div class="card mb-3">
        <div class="card-body">
            <p>{{ $answer->body }}
                @if ($answer->correct)
                <span class="badge bg-success ms-2">Correct</span>
                @endif
            </p>
            <form action="{{ route('questions.answers.destroy', [$question, $answer]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>
    @endforeach

    <form action="{{ route('questions.answers.store', $question) }}" method="POST">
        @csrf
        <div class="mb-3">
            <textarea name="body" class="form-control" rows="3" placeholder="Your answer"></textarea>
        </div>
        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" name="correct" value="1" id="correctAnswer">
            <label class="form-check-label" for="correctAnswer">
                Mark as Correct Answer
            </label>
        </div>
        <button type="submit" class="btn btn-primary">Submit Answer</button>
    </form>

</div>
@endsection