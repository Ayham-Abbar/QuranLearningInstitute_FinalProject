@extends('layouts.app')

@section('content')
<div class="container">
    <h1>نتائج الطلاب للامتحان: {{ $exam->name }} </h1>

    @if($students->isEmpty())
        <p>لا يوجد طلاب مشاركين في هذا الامتحان.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>اسم الطالب</th>
                    <th>النتيجة</th>
                    <th>حالة التقديم</th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                    <tr>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->pivot->score ?? 'لم يتم التقديم' }}</td>
                        <td>
                            @if($student->pivot->is_submitted)
                                <span class="badge bg-success">تم التقديم</span>
                            @else
                                <span class="badge bg-secondary">لم يتم التقديم</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <a href="{{ route('teacher.exams.index') }}" class="btn btn-secondary">رجوع</a>
</div>
@endsection
