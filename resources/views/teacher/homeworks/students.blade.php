@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>الطلاب المشاركون في وظيفة : {{ $homework->title }}</h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>اسم الطالب</th>
                                <th>الحالة</th>
                                <th>ملف الحل</th>
                                <th>إدخال العلامة</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($students as $student)
                                <tr>
                                    <td>{{ $student->name }}</td>
                                    <td>
                                        @if($student->homeworks->isEmpty())
                                            لم يتم تقديم الوظيفة
                                        @else
                                            {{ $student->homeworks->first()->pivot->status }}
                                        @endif
                                    </td>
                                    <td>
                                        @if(!$student->homeworks->isEmpty() && $student->homeworks->first()->pivot->answer)
                                            <a href="{{ asset('storage/' . $student->homeworks->first()->pivot->answer) }}" target="_blank" class="btn btn-primary btn-sm">
                                                عرض الحل
                                            </a>
                                        @else
                                            لا يوجد حل
                                        @endif
                                    </td>
                                    <td>
                                        <form action="{{ route('teacher.homework.grade', ['homeworkId' => $homework->id, 'studentId' => $student->id]) }}" method="POST" class="d-flex flex-row">
                                            @csrf
                                            <input type="text" name="mark" class="form-control" value="{{ $student->homeworks->isNotEmpty() ? $student->homeworks->first()->pivot->mark : '0' }}">
                                            <button type="submit" class="btn btn-success btn-sm m-2">حفظ</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
