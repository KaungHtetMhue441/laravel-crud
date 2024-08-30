@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Question') }}</div>

                <div class="card-body">
                    <!-- Display Validation Errors -->
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <!-- Form to Edit the Question -->
                    <form method="POST" action="{{ route('questions.update', $question) }}">
                        @csrf
                        @method('PUT')

                        <!-- Question Title -->
                        <div class="mb-3">
                            <label for="title" class="form-label">{{ __('Title') }}</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $question->title) }}" required autofocus>
                        </div>

                        <!-- Question Body -->
                        <div class="mb-3">
                            <label for="body" class="form-label">{{ __('Body') }}</label>
                            <textarea class="form-control" id="body" name="body" rows="3" required>{{ old('body', $question->body) }}</textarea>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary">{{ __('Update Question') }}</button>
                        <a href="{{ route('questions.show', $question) }}" class="btn btn-secondary">{{ __('Cancel') }}</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection