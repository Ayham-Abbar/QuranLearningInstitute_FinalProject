@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12 mb-4">
                  <div class="card-header">
                    <h4>دروس {{ $course->name }}</h4>
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
                            <a href="{{ route('teacher.lessons.showVideo', $lesson->id) }}" data-toggle="lightbox" data-gallery="example-gallery">
                                <img src="{{ asset('images/lessons/' . $lesson->image) }}" class="card-img-top" alt="Lesson Image">
                            </a>
                            <!-- Buttons -->                          
                        </div>
                        <!-- Title and Description -->
                        <div class="card-body d-flex flex-column align-items-start">
                              <h5 class="card-title mb-2 fw-bold text-dark">{{ $lesson->name }}</h5>
                              <p class="card-text mt-auto">{{ $lesson->description }}</p>
                        </div>
                        <div class="card-body d-flex flex-row align-items-start" style="gap: 7px;">
                            <a href="{{ route('teacher.lessons.edit', $lesson->id) }}" class="btn btn-warning btn-sm me-2">تعديل</a>
                            <form action="{{ route('teacher.lessons.destroy', $lesson->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">حذف</button>
                            </form>
                            @if ($lesson->homework)
                                <a href="{{route('teacher.homework.index', $lesson->id)}}" class="btn btn-info btn-sm me-2">عرض الوظيفة</a>
                            @else
                                <a href="{{ route('teacher.homework.create', $lesson->id) }}" class="btn btn-info btn-sm me-2">إضافة وظيفة</a>
                            @endif
                            <a href="{{ route('teacher.lessons.students', $lesson->id) }}" class="btn btn-success btn-sm">
                                 الحضور
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
            @endif
        </div>
    </div>
@endsection
