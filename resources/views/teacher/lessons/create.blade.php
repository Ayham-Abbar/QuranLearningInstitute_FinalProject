@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="card-header">
            <h4>إضافة درس</h4>
        </div>
        <form action="{{ route('teacher.lessons.store') }}" method="POST" enctype="multipart/form-data" class="bg-light p-4 rounded shadow">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">الاسم</label>
                <input type="text" id="name" name="name" placeholder="اسم الدرس" class="form-control">
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">الوصف</label>
                <textarea id="description" name="description" placeholder="وصف الدرس" rows="4" class="form-control"></textarea>
            </div>

            <div class="mb-3">
                <label for="video" class="form-label">رفع الفيديو</label>
                <input type="file" id="video" name="video" class="form-control">
            </div>

            <div class="mb-3">
                <label for="course_id" class="form-label">اختر الدورة</label>
                <select id="course_id" name="course_id" class="form-select form-select-lg mb-3">
                    <option value="" selected disabled>اختر دورة...</option>
                    @foreach ($courses as $course)
                        <option value="{{ $course->id }}">{{ $course->name }}</option>
                    @endforeach
                </select>
            </div>
            

            <button type="submit" class="btn btn-primary">إضافة</button>
        </form>
    </div>
@endsection
