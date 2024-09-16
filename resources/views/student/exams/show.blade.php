@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Exam: {{ $exam->name }}</h1>
    <form action="{{ route('student.exams.submit', $exam->id) }}" method="POST">
        @csrf
        @foreach($exam->questions as $question)
            <div class="mb-3">
                <h4>{{ $question->text }}</h4>
                @foreach($question->options as $option)
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="answers[{{ $question->id }}]" value="{{ $option->id }}" required>
                        <label class="form-check-label">{{ $option->text }}</label>
                    </div>
                @endforeach
            </div>
        @endforeach
        <button type="submit" class="btn btn-primary">Submit Exam</button>
    </form>
</div>
@endsection
