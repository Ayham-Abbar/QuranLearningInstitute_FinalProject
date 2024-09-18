@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>الطلاب المشاركين في الدرس: {{ $lesson->name }}</h1>
        
        @if($students->isEmpty())
            <p>لا يوجد طلاب مشاركين في هذا الدرس.</p>
        @else
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>الاسم</th>
                        <th>البريد الإلكتروني</th>
                        <th>الحالة</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($students as $student)
                        <tr>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->email }}</td>
                            <td>{{ $student->pivot->status == 'attended' ? 'حضر' : 'لم يحضر' }}</td> <!-- عرض حالة الحضور -->
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
