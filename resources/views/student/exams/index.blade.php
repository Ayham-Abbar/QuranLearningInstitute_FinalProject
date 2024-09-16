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
                </tr>
            </thead>
            <tbody>
                @foreach($exams as $exam)
                    @php
                        $examUser = $exam->users()->where('user_id', Auth::id())->first();
                        $isSubmitted = $examUser ? $examUser->pivot->is_submitted : false;
                        $score = $isSubmitted ? $examUser->pivot->score : 0;
                    @endphp
                    <tr>
                        <td>{{ $exam->name }}</td>
                        <td>
                            @if($isSubmitted)
                                <span class="badge bg-success">تم التقديم</span>
                            @else
                                <span class="badge bg-secondary">لم يتم التقديم</span>
                            @endif
                        </td>
                        <td>{{ $score }}</td>
                        <td>
                            @if(!$isSubmitted)
                                <a href="{{ route('student.exams.show', $exam->id) }}" class="btn btn-primary btn-sm">تقديم الامتحان</a>
                            @else
                                <button class="btn btn-secondary btn-sm" disabled>تم التقديم</button>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
