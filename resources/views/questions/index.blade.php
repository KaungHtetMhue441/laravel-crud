@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Questions</h1>
    <a href="{{ route('questions.create') }}" class="btn btn-primary mb-3 float-end">Create a Question</a>
    @foreach ($questions as $question)
    <div class="card mb-3 w-100">
        <div class="card-body">
            <h5 class="card-title">{{ $question->title }}</h5>
            <p class="card-text">{{ $question->body }}</p>
            <a href="{{ route('questions.show', $question) }}" class="btn btn-info">View</a>
        </div>
    </div>
    @endforeach
</div>
@endsection