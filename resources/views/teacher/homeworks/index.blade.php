@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>وظيفة الدرس: {{ $lesson->name }}</h4>
                </div>
                <div class="card-body">
                    <h5>{{ $homework->title }}</h5>
                    <p>{{ $homework->description }}</p>

                    @if ($homework->file)
                        <div class="mb-3">
                            <h6>ملف مرفق:</h6>
                            <a href="{{ asset('storage/' . $homework->file) }}" class="btn btn-primary btn-sm" download>
                                <i class="fas fa-download" style="margin-left: 5px;"></i>
                                <span>تحميل الملف</span>
                            </a>
                        </div>
                    @endif

                    <div class="d-flex" style="gap: 7px;">
                        <a href="{{ route('teacher.homework.edit', $homework->id) }}" class="btn btn-warning btn-sm me-2">تعديل</a>

                        <form action="{{ route('teacher.homework.destroy', $homework->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">حذف</button>
                        </form>
                        <a href="{{ route('teacher.homework.students', $homework->id) }}" class="btn btn-info btn-sm">
                            عرض الطلاب المشاركين
                        </a>
                    </div>                        

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
