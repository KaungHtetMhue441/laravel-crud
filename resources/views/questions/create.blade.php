@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create New Question with Answers') }}</div>

                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <!-- Form to Create a New Question with Answers -->
                    <form method="POST" action="{{ route('questions.store') }}">
                        @csrf

                        <!-- Question Title -->
                        <div class="mb-3">
                            <label for="title" class="form-label">{{ __('Title') }}</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required autofocus>
                        </div>

                        <!-- Question Body -->
                        <div class="mb-3">
                            <label for="body" class="form-label">{{ __('Body') }}</label>
                            <textarea class="form-control" id="body" name="body" rows="3" required>{{ old('body') }}</textarea>
                        </div>

                        <!-- Answers -->
                        <div class="mb-3">
                            <label for="answers" class="form-label">{{ __('Answers') }}</label>

                            <!-- Answer 1 -->
                            <div class="input-group mb-2">
                                <input type="text" class="form-control" name="answers[0][body]" placeholder="Answer 1" required>
                                <div class="input-group-text">
                                    <input type="radio" name="correct" value="0" aria-label="Correct Answer">
                                </div>
                            </div>

                            <!-- Answer 2 -->
                            <div class="input-group mb-2">
                                <input type="text" class="form-control" name="answers[1][body]" placeholder="Answer 2" required>
                                <div class="input-group-text">
                                    <input type="radio" name="correct" value="1" aria-label="Correct Answer">
                                </div>
                            </div>

                            <!-- Answer 3 -->
                            <div class="input-group mb-2">
                                <input type="text" class="form-control" name="answers[2][body]" placeholder="Answer 3" required>
                                <div class="input-group-text">
                                    <input type="radio" name="correct" value="2" aria-label="Correct Answer">
                                </div>
                            </div>

                            <!-- Answer 4 -->
                            <div class="input-group mb-2">
                                <input type="text" class="form-control" name="answers[3][body]" placeholder="Answer 4" required>
                                <div class="input-group-text">
                                    <input type="radio" name="correct" value="3" aria-label="Correct Answer">
                                </div>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary">{{ __('Create Question') }}</button>
                        <a href="{{ route('questions.index') }}" class="btn btn-secondary">{{ __('Back') }}</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection