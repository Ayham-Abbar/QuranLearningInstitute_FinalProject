@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>وظيفة الدرس: {{ $homework->lesson->name }}</h4>
                </div>
                <div class="card-body">
                    <h5>{{ $homework->title }}</h5>
                    <p>{{ $homework->description }}</p>

                    @if ($homework->file)
                        <div class="mb-3">
                            <h6>ملف الوظيفة:</h6>
                            <a href="{{ asset('storage/' . $homework->file) }}" class="btn btn-primary btn-sm"  download>
                                <i class="fas fa-download" style="margin-left: 5px;"></i> 
                                <span>تحميل ملف الوظيفة</span>
                            </a>
                        </div>
                    @endif

                    <!-- عرض حالة الطالب -->
                    @if ($userHomework && $userHomework->pivot->status == 'submitted')
                        <div class="alert alert-success">
                            تم رفع الحل بنجاح. 
                            <a href="{{ asset('storage/' . $userHomework->pivot->answer) }}" target="_blank">عرض الحل المرفوع</a>
                        </div>
                    @else
                        <!-- فورم رفع الحل -->
                        <form action="{{ route('student.homework.submit', $homework->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="answer_file" class="form-label">رفع الحل:</label>
                                <input type="file" class="form-control" id="answer_file" name="answer_file" required>
                            </div>
                            <button type="submit" class="btn btn-success">رفع الحل</button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
