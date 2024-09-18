@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>إضافة وظيفة جديدة</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('teacher.homework.store', $lessonId) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="title">عنوان الوظيفة</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
                            @error('title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="description">وصف الوظيفة</label>
                            <textarea class="form-control" id="description" name="description" rows="5" required>{{ old('description') }}</textarea>
                            @error('description')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="file">تحميل ملف (اختياري)</label>
                            <input type="file" class="form-control" id="file" name="file">
                            @error('file')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-success">إضافة</button>
                        <a href="{{ route('teacher.lessons.showLessons', $lessonId) }}" class="btn btn-secondary">إلغاء</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
