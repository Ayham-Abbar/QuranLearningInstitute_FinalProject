@extends('layouts.app')

@section('content')
<div class="container">
    <h1>الامتحانات المتاحة</h1>

    @if($exams->isEmpty())
        <p>لا توجد امتحانات متاحة.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>اسم الامتحان</th>
                    <th>الحالة</th>
                    <th>النتيجة</th>
                    <th>التحكم</th>
                    <th>عدد الأسئلة</th>
                    <th>الإجابات الصحيحة</th>
                </tr>
            </thead>
            <tbody>
                @foreach($exams as $exam)
                    <tr>
                        <td>{{ $exam->name }}</td>
                        <td>
                            @if($status[$loop->index])
                                <span class="badge bg-success">تم التقديم</span>
                            @else
                                <span class="badge bg-secondary">لم يتم التقديم</span>
                            @endif
                        </td>
                        <td>{{ $scores[$loop->index] }}</td>
                        <td>
                            @if(!$status[$loop->index])
                                <a href="{{ route('student.exams.show', $exam->id) }}" class="btn btn-primary btn-sm">تقديم الامتحان</a>
                            @else
                                <button class="btn btn-secondary btn-sm" disabled>تم التقديم</button>
                            @endif
                        </td>
                        <td>{{ $questions_count[$loop->index] }}</td>
                        <td>{{ $questions_answered[$loop->index] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
