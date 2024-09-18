@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12 mb-4">
                <div class="card-header">
                    <h4>دروس مادة {{ $course->name }}</h4>
                    <div class="progress"
                        style="height: 20px;">
                        <div class="progress-bar"
                            role="progressbar"
                            style="width: {{ $progress }}%;"
                            aria-valuenow="{{ $progress }}"
                            aria-valuemin="0"
                            aria-valuemax="100">
                            {{ $progress }}%
                        </div>
                    </div>
                </div>
            </div>
            @if ($lessons->isEmpty())
                <div class="col-md-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-text">لا توجد دروس لعرضها.</p>
                        </div>
                    </div>
                </div>
            @else
                @foreach ($lessons as $lesson)
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card">
                            <div class="position-relative">
                                {{-- image to video --}}
                                <a href="{{ route('student.lessons.showVideo', $lesson->id) }}" data-toggle="lightbox" data-gallery="example-gallery">
                                    <img src="{{ asset('images/lessons/' . $lesson->image) }}" class="card-img-top" alt="Lesson Image">
                                </a>
                            </div>
                            <!-- Title and Description -->
                            <div class="card-body d-flex flex-column align-items-start">
                                <h5 class="card-title mb-2 fw-bold text-dark">{{ $lesson->name }}</h5>
                                <p class="card-text mt-auto">{{ $lesson->description }}</p>

                                <!-- Homework Button -->
                                @if($lesson->homework)
                                    <a href="{{ route('student.homework.show', $lesson->homework->id) }}" class="btn btn-primary btn-sm">
                                        عرض الوظيفة
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection
