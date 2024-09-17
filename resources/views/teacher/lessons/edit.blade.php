@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="card-header">
            <h4>{{ isset($lesson) ? 'تحديث درس' : 'إضافة درس' }}</h4>
        </div>
        <form action="{{ isset($lesson) ? route('teacher.lessons.update', $lesson->id) : route('teacher.lessons.store') }}" method="POST" enctype="multipart/form-data" class="bg-light p-4 rounded shadow">
            @csrf
            @if(isset($lesson))
                @method('PUT')
            @endif

            <div class="mb-3">
                <label for="name" class="form-label">الاسم</label>
                <input type="text" id="name" name="name" value="{{ isset($lesson) ? $lesson->name : old('name') }}" placeholder="اسم الدرس" class="form-control">
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">الوصف</label>
                <textarea id="description" name="description" placeholder="وصف الدرس" rows="4" class="form-control">{{ isset($lesson) ? $lesson->description : old('description') }}</textarea>
            </div>

            <div class="mb-3">
                <label for="video" class="form-label">رفع الفيديو</label>
                <input type="file" id="video" name="video" class="form-control">
                @if(isset($lesson) && $lesson->video)
                    <div class="mt-2">
                        <video width="320" height="240" controls>
                            <source src="{{ asset('storage/' . $lesson->video) }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                        <p class="mt-2">الفيديو الحالي</p>
                    </div>
                @endif
            </div>

            <div class="mb-3">
                <label for="course_id" class="form-label">اختر الدورة</label>
                <select id="course_id" name="course_id" class="form-select form-select-lg mb-3">
                    <option value="" disabled>اختر دورة...</option>
                    @foreach ($courses as $course)
                        <option value="{{ $course->id }}" {{ isset($lesson) && $lesson->course_id == $course->id ? 'selected' : '' }}>{{ $course->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">{{ isset($lesson) ? 'تحديث' : 'إضافة' }}</button>
        </form>
    </div>
@endsection
