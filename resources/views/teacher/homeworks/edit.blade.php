@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>تعديل الوظيفة</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('teacher.homework.update', $homework->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group mb-3">
                            <label for="title">عنوان الوظيفة</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $homework->title) }}" required>
                            @error('title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="description">وصف الوظيفة</label>
                            <textarea class="form-control" id="description" name="description" rows="5" required>{{ old('description', $homework->description) }}</textarea>
                            @error('description')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="file">تحديث الملف (اختياري)</label>
                            <input type="file" class="form-control" id="file" name="file" value="{{ old('file', $homework->file) }} ">
                            @error('file')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">تعديل</button>
                        <a href="{{ route('teacher.lessons.showLessons', $homework->lesson_id) }}" class="btn btn-secondary">إلغاء</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
